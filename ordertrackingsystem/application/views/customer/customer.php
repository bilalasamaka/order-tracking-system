<?php
defined('BASEPATH') OR exit('');
?>

<div class="row hidden-print">
    <div class="col-sm-12">
        <div class="pwell">
            <!-- Header (add new admin, sort order etc.) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2 fa fa-user-plus pointer" style="color:#337ab7" data-target='#addNewAdminModal' data-toggle='modal'>
                        Yeni Müşteri Ekle
                    </div>
                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for="adminListPerPage">Gösterilecek Aralık:</label>
                        <select id="adminListPerPage" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-sm-4 form-inline form-group-sm">
                        <label for="adminListSortBy" class="control-label">Sırala:</label> 
                        <select id="adminListSortBy" class="form-control">
                            <option value="first_name-ASC" selected>İsim (A'dan Z'ye)</option>
                            <option value="first_name-DESC">İsim (Z'den A'ya)</option>
                            <option value="created_on-ASC">Oluşturulma Tarihi (En Eski)</option>
                            <option value="created_on-DESC">Oluşturulma Tarihi (En Yeni)</option>
                            <option value="email-ASC">E-mail - (A'dan Z'ye)</option>
                            <option value="email-DESC">E-mail - (Z'den A'ya)</option>
                        </select>
                    </div>
                    <div class="col-sm-3 form-inline form-group-sm">
                        <label for="adminSearch"><i class="fa fa-search"></i></label>
                        <input type="search" id="adminSearch" placeholder="Arama...." class="form-control">
                    </div>
                </div>
            </div>
            
            <hr>
            <!-- Header (sort order etc.) ends -->
            
            <!-- Admin list -->
            <div class="row">
                <div class="col-sm-12" id="allCustomer"></div>
            </div>
            <!-- Admin list ends -->
        </div>
    </div>
</div>


<!--- Modal to add new admin --->
<div class='modal fade' id='addNewAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">Yeni Müşteri Ekle</h4>
                <div class="text-center">
                    <i id="fMsgIcon"></i><span id="fMsg"></span>
                </div>
            </div>
            <div class="modal-body">
                <form id='addNewAdminForm' name='addNewAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstName' class="control-label">İsim</label>
                            <input type="text" id='firstName' class="form-control checkField" placeholder="İsim">
                            <span class="help-block errMsg" id="firstNameErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastName' class="control-label">Soyisim</label>
                            <input type="text" id='lastName' class="form-control checkField" placeholder="Soyisim">
                            <span class="help-block errMsg" id="lastNameErr"></span>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='email' class="control-label">E-mail</label>
                            <input type="email" id='email' class="form-control checkField" placeholder="ornek@ornek.com">
                            <span class="help-block errMsg" id="emailErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='address' class="control-label">Adres</label>
                            <input type="address" id='address' class="form-control checkField" placeholder="Cadde / Mahalle / Sokak / Numara">
                            <span class="help-block errMsg" id="addressErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1' class="control-label">Cep Telefonu</label>
                            <input type="tel" id='mobile1' class="form-control checkField" placeholder="05xxxxxxxxx">
                            <span class="help-block errMsg" id="mobile1Err"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile2' class="control-label">İş Telefonu</label>
                            <input type="tel" id='mobile2' class="form-control" placeholder="0216xxxxxxx (opsiyonel)">
                            <span class="help-block errMsg" id="mobile2Err"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for="passwordOrig" class="control-label">Şifre:</label>
                            <input type="password" class="form-control checkField" id="passwordOrig" placeholder="**********">
                            <span class="help-block errMsg" id="passwordOrigErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for="passwordDup" class="control-label">Şifre Tekrarı:</label>
                            <input type="password" class="form-control checkField" id="passwordDup" placeholder="**********">
                            <span class="help-block errMsg" id="passwordDupErr"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="addNewAdminForm" class="btn btn-warning pull-left">Formu Temizle</button>
                <button type='button' id='addAdminSubmit' class="btn btn-primary">Ekle</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Kapat</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to add new admin --->







<!--- Modal for editing admin details --->
<div class='modal fade' id='editAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">Admin Düzenle</h4>
                <div class="text-center">
                    <i id="fMsgEditIcon"></i>
                    <span id="fMsgEdit"></span>
                </div>
            </div>
            <div class="modal-body">
                <form id='editAdminForm' name='editAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='firstNameEdit' class="control-label">İsim</label>
                            <input type="text" id='firstNameEdit' class="form-control checkField" placeholder="İsim">
                            <span class="help-block errMsg" id="firstNameEditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='lastNameEdit' class="control-label">Soyisim</label>
                            <input type="text" id='lastNameEdit' class="form-control checkField" placeholder="Soyisim">
                            <span class="help-block errMsg" id="lastNameEditErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='emailEdit' class="control-label">E-mail</label>
                            <input type="email" id='emailEdit' class="form-control checkField" placeholder="ornek@ornek.com">
                            <span class="help-block errMsg" id="emailEditErr"></span>
                        </div>                       
                        <div class="form-group-sm col-sm-6">
                            <label for='address' class="control-label">Adres</label>
                            <input type="address" id='address' class="form-control checkField" placeholder="Cadde / Mahalle / Sokak / Numara">
                            <span class="help-block errMsg" id="addressErr"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile1Edit' class="control-label">Telefon Numarası</label>
                            <input type="tel" id='mobile1Edit' class="form-control checkField" placeholder="05xxxxxxxxx">
                            <span class="help-block errMsg" id="mobile1EditErr"></span>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label for='mobile2Edit' class="control-label">İş Numarası</label>
                            <input type="tel" id='mobile2Edit' class="form-control" placeholder="0216xxxxxxx (opsiyonel)">
                            <span class="help-block errMsg" id="mobile2EditErr"></span>
                        </div>
                    </div>
                    
                    <input type="hidden" id="adminId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" form="editAdminForm" class="btn btn-warning pull-left">Formu Temizle</button>
                <button type='button' id='editAdminSubmit' class="btn btn-primary">Güncelle</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Kapat</button>
            </div>
        </div>
    </div>
</div>
<!--- end of modal to edit admin details --->
<script src="<?=base_url()?>public/js/admin.js"></script>