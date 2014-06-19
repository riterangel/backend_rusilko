<!-- DataTables Plugin -->
<?= $this->Html->script('../plugins/datatables/jquery.dataTables.min'); ?>
<!-- DataTables Plugin Funciones -->
<?= $this->Html->script('languages/index'); ?>

<div class="da-panel collapsible">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="/images/icons/black/16/list.png" alt="" />
            Listado de Languages
        </span>
    </div>
    <div class="da-panel-toolbar top">
        <ul>
            <li>
                <?php
                echo $this->Html->link($this->Html->image("/images/icons/color/add.png", array("alt" => "Agregar")).'Agregar', array('controller' => 'languages','action' => 'add'), array('escape' => false));
                ?>
            </li>
        </ul>
    </div>
    <div class="da-panel-content">
        <table id="table_languages" class="da-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Shot Name</th>
                <th>Active</th>
                <th style="text-align: center;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($languages as $language): ?>
                <tr>
                    <td>
                        <?= $language['Language']['id']; ?>
                    </td>
                    <td>
                        <?= $language['Language']['name']; ?>
                    </td>
                    <td>
                        <?= $language['Language']['short_name'];?>
                    </td>
                    <td>
                        <?= $language['Language']['active'];?>
                    </td>

                    <td style="text-align: center;">
                        <?php
                        $editar = $this->Html->image('/images/icons/color/pencil.png', array('alt' => 'Editar'));
                        $eliminar = $this->Html->image('/images/icons/color/cross.png', array('alt' => 'Eliminar'));
                        ?>
                        <?= $this->Html->link($editar, array('controller' => 'languages', 'action' => 'edit', $language['Language']['id']), array('escape' => false));?>
                        |
                        <?= $this->Form->postLink($eliminar, array('controller' => 'languages', 'action' => 'delete', $language['Language']['id']),array('confirm' => "Estas seguro de eliminar {$language['Language']['name']}?", 'escape' => false))?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>