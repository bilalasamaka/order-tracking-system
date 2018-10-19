<?php defined('BASEPATH') OR exit('') ?>

<div class='col-sm-6'>
    <?= isset($range) && !empty($range) ? $range : ""; ?>
</div>

<div class='col-sm-6 text-right'><b>Ürün Toplam Değer / Fiyat:</b> &#8378;<?=$cum_total ? number_format($cum_total, 2) : '0.00'?></div>

<div class='col-xs-12'>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Ürünler</div>
        <?php if($allItems): ?>
        <div class="table table-responsive">
            <table class="table table-bordered table-striped" style="background-color: #f5f5f5">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>ÜRÜN İSMİ</th>
                        <th>ÜRÜN KODU</th>
                        <th>AÇIKLAMA</th>
                        <th>STOK MİKTARI</th>
                        <th>BİRİM FİYATI</th>
                        <th>TOPLAM SATIŞ</th>
                        <th>ÜRÜNDEN TOPLAM KAZANÇ</th>
                        <th>MİKTARI GÜNCELLE</th>
                        <th>DÜZENLE</th>
                        <th>SİL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allItems as $get): ?>
                    <tr>
                        <input type="hidden" value="<?=$get->id?>" class="curItemId">
                        <th class="itemSN"><?=$sn?>.</th>
                        <td><span id="itemName-<?=$get->id?>"><?=$get->name?></span></td>
                        <td><span id="itemCode-<?=$get->id?>"><?=$get->code?></td>
                        <td>
                            <span id="itemDesc-<?=$get->id?>" data-toggle="tooltip" title="<?=$get->description?>" data-placement="auto">
                                <?=word_limiter($get->description, 15)?>
                            </span>
                        </td>
                        <td class="<?=$get->quantity <= 10 ? 'bg-danger' : ($get->quantity <= 25 ? 'bg-warning' : '')?>">
                            <span id="itemQuantity-<?=$get->id?>"><?=$get->quantity?></span>
                        </td>
                        <td>&#8378;<span id="itemPrice-<?=$get->id?>"><?=number_format($get->unitPrice, 2)?></span></td>
                        <td><?=$this->genmod->gettablecol('transactions', 'SUM(quantity)', 'itemCode', $get->code)?></td>
                        <td>
                            &#8378;<?=number_format($this->genmod->gettablecol('transactions', 'SUM(totalPrice)', 'itemCode', $get->code), 2)?>
                        </td>
                        <td><a class="pointer updateStock" id="stock-<?=$get->id?>">Miktarı Güncelle</a></td>
                        <td class="text-center text-primary">
                            <span class="editItem" id="edit-<?=$get->id?>"><i class="fa fa-pencil pointer"></i> </span>
                        </td>
                        <td class="text-center"><i class="fa fa-trash text-danger delItem pointer"></i></td>
                    </tr>
                    <?php $sn++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- table div end-->
        <?php else: ?>
        <ul><li>No items</li></ul>
        <?php endif; ?>
    </div>
    <!--- panel end-->
</div>

<!---Pagination div-->
<div class="col-sm-12 text-center">
    <ul class="pagination">
        <?= isset($links) ? $links : "" ?>
    </ul>
</div>
