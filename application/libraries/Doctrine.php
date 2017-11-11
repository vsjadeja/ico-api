<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Mapping\Driver\AnnotationDriver,
    Doctrine\Common\Annotations\AnnotationReader;

/**
 * Doctrine bootstrap library for CodeIgniter
 *
 * @category    Libraries
 * @author      Virendra Jadeja <virendrajadeja84@gmail.com>
 * @version     1.5
 */
class Doctrine {

    public $em;

    public function __construct() {
        require_once __DIR__ . '/Doctrine/ORM/Tools/Setup.php';
        Setup::registerAutoloadDirectory(__DIR__);

        require_once APPPATH . 'libraries/Doctrine/Common/ClassLoader.php';

        require APPPATH . 'config/' . ENVIRONMENT . '/database.php';

        $connection_options = array(
            'driver' => 'pdo_mysql',
            'user' => $db[$active_group]['username'],
            'password' => $db[$active_group]['password'],
            'host' => $db[$active_group]['hostname'],
            'dbname' => $db[$active_group]['database'],
            'charset' => $db[$active_group]['char_set'],
            'driverOptions' => array(
                'charset' => $db[$active_group]['char_set'],
            ),
        );

        $models_namespace = 'Entity';
        $models_path = APPPATH . 'models';
        $proxies_dir = APPPATH . 'models/Proxies';
        $metadata_paths = array(APPPATH . 'models');
        $extension_dir = APPPATH . 'libraries/Doctrine';
        $dev_mode = true;

        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode, $proxies_dir);
        $driver = new AnnotationDriver(new AnnotationReader());
        $config->setMetadataDriverImpl($driver);

        require_once APPPATH . 'libraries/Doctrine/DoctrineExtensions/Query/MySql/GroupConcat.php';
        require_once APPPATH . 'libraries/Doctrine/DoctrineExtensions/Query/MySql/ConcatWs.php';
        require_once APPPATH . 'libraries/Doctrine/DoctrineExtensions/Query/MySql/IfNull.php';
        require_once APPPATH . 'libraries/Doctrine/DoctrineExtensions/Query/MySql/Round.php';
        require_once APPPATH . 'libraries/Doctrine/DoctrineExtensions/Query/MySql/Year.php';
        require_once APPPATH . 'libraries/Doctrine/DoctrineExtensions/Query/MySql/Month.php';

        $config->addCustomStringFunction('GroupConcat', '\DoctrineExtensions\Query\Mysql\GroupConcat');
        $config->addCustomStringFunction('ConcatWs', '\DoctrineExtensions\Query\Mysql\ConcatWs');
        $config->addCustomStringFunction('IfNull', '\DoctrineExtensions\Query\Mysql\IfNull');
        $config->addCustomStringFunction('Round', '\DoctrineExtensions\Query\Mysql\Round');
        $config->addCustomStringFunction('Year', '\DoctrineExtensions\Query\Mysql\Year');
        $config->addCustomStringFunction('Month', '\DoctrineExtensions\Query\Mysql\Month');

        $this->em = EntityManager::create($connection_options, $config);

        $classLoader = new ClassLoader('DoctrineExtensions', $extension_dir);
        $classLoader->register();

        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();
        //$this->generate_models();
    }

    public function serialize($entity) {
        if (is_array($entity)):
            $result = array();
            foreach ($entity as $obj) {
                $result[] = $this->_do_serializeTopLevel($obj);
            }
            return $result;
        else:
            if (get_class($entity) == 'Doctrine\ORM\PersistentCollection'):
                return $this->serialize($entity->getValues());
            else:
                return $this->_do_serializeTopLevel($entity);
            endif;
        endif;
    }

    public function serializeWithFullDepth($entity, $level = 1) {
        if (is_array($entity)):
            $result = array();
            foreach ($entity as $obj) {
                $result[] = $this->_do_serializeWithFullDepth($obj, $level);
            }
            return $result;
        else:
            if (get_class($entity) == 'Doctrine\ORM\PersistentCollection'):
                return $this->serializeWithFullDepth($entity->getValues(), $level);
            else:
                return $this->_do_serializeWithFullDepth($entity, $level);
            endif;
        endif;
    }

    private function _do_serializeWithFullDepth($entity, $level = 1, $cLevel = 0) {
        $data = array();
        try {
            $className = str_replace("DoctrineProxies\\__CG__\\", "", get_class($entity));
            $metaData = $this->em->getClassMetadata($className);
            $hideColumns = $this->getHideColumns();
            $imageColumns = $this->getImageColumns();
            $cLevel++;

            foreach ($metaData->fieldMappings as $field => $mapping) {
                if (!in_array($field, $hideColumns)):
                    $method = "get" . ucfirst($field);
                    if (in_array($field, $imageColumns)):
                        require_once (APPPATH . 'helpers/upload_helper.php');
                        $data[$field] = getImagePath($field, call_user_func(array($entity, $method)));
                    else:
                        $data[$field] = call_user_func(array($entity, $method));
                    endif;
                endif;
            }

            foreach ($metaData->associationMappings as $field => $mapping) {
                // get associated objects
                $object = $metaData->reflFields[$field]->getValue($entity);
                if ($object && strpos(get_class($object), "Doctrine\\ORM") === FALSE):
                    if ($cLevel == $level):
                        $data[$field] = $this->_do_serializeTopLevel($object);
                    else:
                        $data[$field] = $this->_do_serializeWithFullDepth($object, $cLevel, $cLevel);
                    endif;
                endif;
            }
        } catch (Exception $ex) {
            log_message("error", $ex->getMessage());
        }

        return $data;
    }

    private function _do_serializeTopLevel($entity) {
        $className = get_class($entity);

        $uow = $this->em->getUnitOfWork();
        $entityPersister = $uow->getEntityPersister($className);
        $classMetadata = $entityPersister->getClassMetadata();
        $hideColumns = $this->getHideColumns();
        $imageColumns = $this->getImageColumns();

        $result = array();
        foreach ($uow->getOriginalEntityData($entity) as $field => $value) {

            if (isset($classMetadata->associationMappings[$field])) {
                $assoc = $classMetadata->associationMappings[$field];

                // Only owning side of x-1 associations can have a FK column.
                if (!$assoc['isOwningSide'] || !($assoc['type'] & \Doctrine\ORM\Mapping\ClassMetadata::TO_ONE)) {
                    continue;
                }

                if ($value !== null) {
                    $newValId = $uow->getEntityIdentifier($value);
                }

                $targetClass = $this->em->getClassMetadata($assoc['targetEntity']);
                $owningTable = $entityPersister->getOwningTable($field);

                foreach ($assoc['joinColumns'] as $joinColumn) {
                    $sourceColumn = $joinColumn['name'];
                    $targetColumn = $joinColumn['referencedColumnName'];

                    if ($value === null) {
                        $result[$sourceColumn] = null;
                    } else if ($targetClass->containsForeignIdentifier) {
                        $result[$sourceColumn] = $newValId[$targetClass->getFieldForColumn($targetColumn)];
                    } else {
                        $result[$sourceColumn] = $newValId[$targetClass->fieldNames[$targetColumn]];
                    }
                }
            } elseif (isset($classMetadata->columnNames[$field])) {
                if (!in_array($field, $hideColumns)):
                    $columnName = $classMetadata->columnNames[$field];
                    if (in_array($field, $imageColumns)):
                        require_once (APPPATH . 'helpers/upload_helper.php');
                        $result[$columnName] = getImagePath($field, $value);
                    else:
                        $result[$columnName] = $value;
                    endif;
                endif;
            }
        }
        return $result;
    }

    private function getHideColumns() {
        return array(
            //'status',
            //'createdBy',
            //'createdDate',
            'updatedBy',
            'updatedDate',
            'password'
        );
    }

    private function getImageColumns() {
        return array(
            'dp',
            'thumb',
            'logoUrl',
            'textImageUrl'
        );
    }

    /**
     * Function for generating fully qualified image sources.
     * @param array $sources QueryBuilder multidimentional array.
     * @return array
     */
    public function processImagePath($sources) {
        try {
            $hideColumns = $this->getHideColumns();
            $imageColumns = $this->getImageColumns();
            foreach ($sources as $i => $row):
                if (is_array($row)):
                    foreach ($row as $key => $val):
                        if (!in_array($key, $hideColumns)):
                            if (in_array($key, $imageColumns)):
                                require_once (APPPATH . 'helpers/upload_helper.php');
                                $sources[$i][$key] = getImagePath($key, $val);
                            endif;
                        else:
                            unset($sources[$i][$key]);
                        endif;
                    endforeach;
                endif;
            endforeach;
        } catch (Exception $ex) {
            log_message("error", $ex->getMessage());
        }
        return $sources;
    }

    public function generate_models() {
        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        $this->em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('numeric', 'integer');

        $this->em->getConfiguration()
                ->setMetadataDriverImpl(
                        new Doctrine\ORM\Mapping\Driver\DatabaseDriver(
                        $this->em->getConnection()->getSchemaManager()
                        )
        );

        $cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
        $cmf->setEntityManager($this->em);
        $metadata = $cmf->getAllMetadata();
        $generator = new Doctrine\ORM\Tools\EntityGenerator();

        $generator->setUpdateEntityIfExists(false);
        $generator->setAddPrefixForClass(true);
        $generator->setGenerateStubMethods(true);
        $generator->setGenerateAnnotations(true);
        $generator->generate($metadata, APPPATH . "models/Entity");
    }

}
