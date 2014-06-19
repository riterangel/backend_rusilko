<!-- DataTables Plugin -->
<?= $this->Html->script('../plugins/datatables/jquery.dataTables.min'); ?>
<!-- DataTables Plugin Funciones -->
<?= $this->Html->script('dictionaries/index'); ?>
<?
?>
<div class="da-panel collapsible">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="/images/icons/black/16/list.png" alt="" />
            Listado de Dictionary
        </span>
    </div>
    <div class="da-panel-toolbar top">
        <ul>
            <li>
                <?php
                echo $this->Html->link($this->Html->image("/images/icons/color/add.png", array("alt" => "Agregar")).'Agregar', array('controller' => 'dictionaries','action' => 'add'), array('escape' => false));
                ?>
            </li>
        </ul>
    </div>
    <div class="da-panel-content">
        <table id="table_dictionaries" class="da-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Language</th>
                <th>Key</th>
                <th>Text</th>
                <th style="text-align: center;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dictionaries as $dictionary): ?>
                <tr>
                    <td>
                        <?= $dictionary['Dictionary']['id'];?>
                    </td>
                    <td>
                        <?= $dictionary['Language']['name']; ?>
                    </td>
                    <td>
                        <?= $dictionary['Dictionary']['key']; ?>
                    </td>
                    <td>
                        <?
                        $crop = "";
                        if( strlen($dictionary['Dictionary']['txt']) > 200)
                            $crop = "...";
                          echo htmlentities (substr ( $dictionary['Dictionary']['txt'] , 0 , 200 )) . $crop;?>
                    </td>
                    <td style="text-align: center;">
                        <?php
                        $editar = $this->Html->image('/images/icons/color/pencil.png', array('alt' => 'Editar'));
                        $eliminar = $this->Html->image('/images/icons/color/cross.png', array('alt' => 'Eliminar'));
                        ?>
                        <?= $this->Html->link($editar, array('controller' => 'dictionaries', 'action' => 'edit', $dictionary['Dictionary']['id']), array('escape' => false));?>
                        |
                        <?= $this->Form->postLink($eliminar, array('controller' => 'dictionaries', 'action' => 'delete', $dictionary['Dictionary']['id']),array('confirm' => "Estas seguro de eliminar {$dictionary['Dictionary']['id']}?", 'escape' => false))?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>