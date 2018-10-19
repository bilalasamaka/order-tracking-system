<?php
defined('BASEPATH') OR exit('');
?>

<div class="pwell hidden-print"> 
    <div class="row">
        <div class="col-sm-6">
            <a href="<?=base_url()?>misc/dldb" download="myfresh.sqlite"><button class="btn btn-primary">Veritabanını Yedekle</button></a>
        </div>

        <br class="visible-xs">
        
        <div class="col-sm-6">
            <button class="btn btn-info" id="importdb">Veritabanını Geri Yükle</button>
            <span class="help-block">Veritabanı Tipi .sqlite Olmalı</span>
            <input type="file" id="selecteddbfile" class="hidden" accept=".sqlite">
            <span class="help-block" id="dbFileMsg"></span>
        </div>
    </div>
</div>