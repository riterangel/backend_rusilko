<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="/plugins/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/galleries/add.js"></script>

<?php
    $action = $this->request->params['action'];
?>

<div class="da-panel collapsible">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="/images/icons/black/16/pencil.png" alt="" />
            Formulario Galleries
        </span>
    </div>
    <div class="da-panel-content">
        <?= $this->Form->create('Gallery', array('id' => 'form_gallery','class' => 'da-form', 'url' => array('controller' => 'galleries', 'action' => $action))); ?>
        <div class="da-form-row">
            <label>Name <span class="required"><span>*</span></label>
            <div class="da-form-item">
                <?= $this->Form->input('name_key', array('label' => false, 'div' => false)); ?>
            </div>
        </div>
        <div class="da-form-row">
            <label>Active <span class="required"></label>
            <div class="da-form-item">
                <ul class="da-form-list">
                    <li>
                        <?= $this->Form->input('active', array('label' => false, 'div' => false)); ?>
                    </li>
                </ul>
            </div>
        </div>

        <div class="da-button-row">
            <a href="<?= $this->Html->url(array('controller' => 'galleries', 'action' => 'index'))?>">
                <input type="button" value="Cancelar" class="da-button orange large left"/></a>
            <input type="submit" value="Guardar" class="da-button green large"/>
        </div>
        </form>
    </div>
</div>