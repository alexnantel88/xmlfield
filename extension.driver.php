<?php

class extension_XMLField extends Extension
{

    public function getSubscribedDelegates()
    {
        return array(
            array(
                'page' => '/backend/',
                'delegate' => 'InitaliseAdminPageHead',
                'callback' => 'initaliseAdminPageHead'
            )
        );
    }

    public function initaliseAdminPageHead($context)
    {
        $callback = Symphony::Engine()->getPageCallback();

        if($callback['driver'] == 'publish' && $callback['context']['page'] != 'index') {
            Administration::instance()->Page->addStylesheetToHead(URL . '/extensions/xmlfield/assets/publish.xmlfield.css');
        }
    }

    public function install()
    {

        return Symphony::Database()
            ->create('tbl_fields_xml')
            ->ifNotExists()
            ->fields([
                'id' => [
                    'type' => 'int(11)',
                    'auto' => true,
                ],
                'field_id' => 'int(11)',
                'size' => 'int(3)',
            ])
            ->keys([
                'id' => 'primary',
                'field_id' => 'key',
            ])
            ->execute()
            ->success();
    }

    public function uninstall()
    {
        return Symphony::Database()
            ->drop('tbl_fields_xml')
            ->ifExists()
            ->execute()
            ->success();
    }
}
