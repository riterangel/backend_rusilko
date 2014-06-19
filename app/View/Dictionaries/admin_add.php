<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="/plugins/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/dictionaries/add.js"></script>

<?php
    $action = $this->request->params['action'];
?>

<div class="da-panel collapsible">
    <div class="da-panel-header">
        <span class="da-panel-title">
            <img src="/images/icons/black/16/pencil.png" alt="" />
            Formulario Dictionary
        </span>
    </div>
    <div class="da-panel-content">
        <?= $this->Form->create('Dictionary', array('id' => 'form_language','class' => 'da-form', 'url' => array('controller' => 'dictionaries', 'action' => $action))); ?>
            <div class="da-form-row">
                <label>Language <span class="required"><span>*</span></label>
                <div class="da-form-item">
                    <?= $this->Form->input('language_id' ,array(
                    'type' => 'select',
                    'label' => false,
                    'options' => $languages,
                    'empty' => false
                    ));
                    ?>
                </div>
            </div>
            <div class="da-form-row">
                <label>Key <span class="required"><span>*</span></label>
                <div class="da-form-item">
                    <?= $this->Form->input('key' ,array(
                        'type' => 'select',
                        'label' => false,
                        'options' => $keys,
                        'empty' => false
                    ));
                    ?>
                </div>
            </div>
            <div class="da-form-row">
                <label>Text </label>
                <div class="da-form-item large">
                    <div name="data[Dictionary][txt]" id="Dictionarytext"><?= isset($txt)?$txt:"" ?></div>
                </div>
            </div>

            <div class="da-button-row">
                <a href="<?= $this->Html->url(array('controller' => 'dictionaries', 'action' => 'index'))?>">
                    <input type="button" value="Cancelar" class="da-button orange large left"/></a>
                <input type="submit" value="Guardar" class="da-button green large"/>
            </div>
        </form>
    </div>
</div>