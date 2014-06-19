<!-- DataTables Plugin -->
<?= $this->Html->script('../plugins/datatables/jquery.dataTables.min'); ?>
<!-- DataTables Plugin Funciones -->
<?= $this->Html->script('galleries/index'); ?>

<div class="da-panel collapsible">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="/images/icons/black/16/list.png" alt="" />
            Listado de Galleries
        </span>
    </div>
    <div class="da-panel-toolbar top">
        <ul>
            <li>
                <?php
                echo $this->Html->link($this->Html->image("/images/icons/color/add.png", array("alt" => "Agregar")).'Agregar', array('controller' => 'galleries','action' => 'add'), array('escape' => false));
                ?>
            </li>
        </ul>
    </div>
    <div class="da-panel-content">
        <table id="table_galleries" class="da-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Active</th>
                <th style="text-align: center;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($galleries as $gallery): ?>
                <tr>
                    <td>
                        <?= $gallery['Gallery']['id']; ?>
                    </td>
                    <td>
                        <?= $gallery['Gallery']['name_key']; ?>
                    </td>
                    <td>
                        <?= $gallery['Gallery']['active'];?>
                    </td>

                    <td style="text-align: center;">
                        <?php
                        $editar = $this->Html->image('/images/icons/color/pencil.png', array('alt' => 'Editar'));
                        $eliminar = $this->Html->image('/images/icons/color/cross.png', array('alt' => 'Eliminar'));
                        ?>
                        <?= $this->Html->link($editar, array('controller' => 'galleries', 'action' => 'edit', $gallery['Gallery']['id']), array('escape' => false));?>
                        |
                        <?= $this->Form->postLink($eliminar, array('controller' => 'galleries', 'action' => 'delete', $gallery['Gallery']['id']),array('confirm' => "Estas seguro de eliminar {$gallery['Gallery']['name_key']}?", 'escape' => false))?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>