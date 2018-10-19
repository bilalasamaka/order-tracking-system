<?php
defined('BASEPATH') OR exit('');
?>

<?php echo isset($range) && !empty($range) ? "Gösterilen ".$range : ""?>
<div class="panel panel-primary">
    <div class="panel-heading">ADMİN HESAPLARI</div>
    <?php if($allAdministrators):?>
    <div class="table table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>İSİM SOYİSİM</th>
                    <th>E-MAIL</th>
                    <th>CEP TELEFONU</th>
                    <th>İŞ TELEFONU</th>
                    <th>HESAP TÜRÜ</th>
                    <th>OLUŞTURULMA TARİHİ</th>
                    <th>SON OTURUM AÇMA TARİHİ</th>
                    <th>DÜZENLE</th>
                    <th>HESAP DURUMU</th>
                    <th>SİL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allAdministrators as $get):?>
                    <tr>
                        <th><?=$sn?>.</th>
                        <td class="adminName"><?=$get->first_name ." ". $get->last_name?></td>
                        <td class="hidden firstName"><?=$get->first_name?></td>
                        <td class="hidden lastName"><?=$get->last_name?></td>
                        <td class="adminEmail"><?=mailto($get->email)?></td>
                        <td class="adminMobile1"><?=$get->mobile1?></td>
                        <td class="adminMobile2"><?=$get->mobile2?></td>
                        <td class="adminRole"><?php if(strcmp($get->role, 'Basic')) { echo "Yönetici";} elseif(strcmp($get->role, 'Super')) { echo "Çalışan";} ?></td>
                        <td><?=date('jS M, Y h:i:sa', strtotime($get->created_on))?></td>
                        <td>
                            <?=$get->last_login === "0000-00-00 00:00:00" ? "---" : date('jS M, Y h:i:sa', strtotime($get->last_login))?>
                        </td>
                        <td class="text-center editAdmin" id="edit-<?=$get->id?>">
                            <i class="fa fa-pencil pointer"></i>
                        </td>
                        <td class="text-center suspendAdmin text-success" id="sus-<?=$get->id?>">
                            <?php if($get->account_status === "1"): ?>
                            <i class="fa fa-toggle-on pointer"></i>
                            <?php else: ?>
                            <i class="fa fa-toggle-off pointer"></i>
                            <?php endif; ?>
                        </td>
                        <td class="text-center text-danger deleteAdmin" id="del-<?=$get->id?>">
                            <?php if($get->deleted === "1"): ?>
                            <a class="pointer">Geri Al</a>
                            <?php else: ?>
                            <i class="fa fa-trash pointer"></i>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php $sn++;?>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?php else:?>
    Yönetici Hesabı Yok
    <?php endif; ?>
</div>
<!-- Pagination -->
<div class="row text-center">
    <?php echo isset($links) ? $links : ""?>
</div>
<!-- Pagination ends -->