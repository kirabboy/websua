@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')
@section('content')
<section class="content_list_manager p-4">

 
    <div class="button-option-top">
        <a class="btn  btn-social btn-success "  href="#" data-toggle="modal" data-target="#create_sales" id="btn_add">
            <i class="fa fa-fw fa-plus-square-o"></i> Thêm mới
        </a>
    </div>

    <div id="cityGriditems">
        <div class="modal fade" id="create_sales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: none !important">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4 class="modal-title">
                                <div class="button-zoomout">
                                </div>Thêm mới đại lý
                                <a class="anchorjs-link">
                                    <span class="anchorjs-icon">
                                    </span>
                                </a>
                            </h4>
                        </div>
                        <div class="content-modal">

                            <form id="SystemCityForm">
                                <div class="box-body">
                                    <input type="hidden" name="do" id="do" value="Add">
                                    <input type="hidden" name="ItemID" id="ItemID" value="0">
                                    <div class="">
                                        <div class="form-group ">
                                            <div class="col-sm-2">
                                                <label>Tên trung tâm</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="Name" id="Name">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-sm-2">
                                                <label>Thông tin TK</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <textarea rows="10" id="BankJson" name="BankJson" class="form-control" style="visibility: hidden; display: none;"></textarea>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-2">
                                                <label>Thứ tự hiển thị</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input class="form-control text-box single-line maskNumber" id="SortOrder" name="SortOrder" type="number" maxlength="3" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2">
                                                <label>Hiển thị</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <label>
                                                    <input type="checkbox" name="IsUsedNew" id="IsUsedNew" checked="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button id="submit" type="submit" class="btn btn-success">Thêm mới</button>
                                    <button id="reset" type="reset" class="btn btn-warning">Nhập lại</button>
                                    <button id="close" type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"><span class="fa fa-close"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box" id="gridItems">
            <div class="box-body table-responsive">
                <div id="tblContent_wrapper" class="dataTables_wrapper form-inline no-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_length" id="tblContent_length"><label><select name="tblContent_length" aria-controls="tblContent" class="form-control input-sm">
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="-1">All</option>
                                    </select> bản ghi trên trang</label></div>
                        </div>
                        <div class="col-xs-6">
                            <div id="tblContent_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="tblContent"></label></div>
                        </div>
                    </div>
                    <table id="tblContent" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="tblContent_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="tblContent" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 59px;">ID</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Tên" style="width: 721px;">Tên</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Hiển thị" style="width: 146px;">Hiển thị</th>
                                <th class="action sorting_disabled" rowspan="1" colspan="1" aria-label="
                        
                            Action 
                            
                                    Hiển thị chọn
                                                                    Ẩn chọn
                                                                    Xóa chọn
                            
                        
                    " style="width: 216px;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#showAll" class="showAll" title="Hiển thị danh sách đã chọn"><i class="fa  fa-check"></i>Hiển thị chọn</a></li>
                                            <li><a href="#hideAll" class="hideAll" title="Ẩn danh sách đã chọn"><i class="fa fa-exclamation"></i>Ẩn chọn</a></li>
                                            <li><a href="#deleteAll" title="Xóa danh sách đã chọn" class="deleteAll"><i class="fa fa-trash"></i>Xóa chọn</a></li>
                                        </ul>
                                    </div>
                                </th>
                                <th class="act_roles sorting_disabled" rowspan="1" colspan="1" aria-label="
                        
                            
                        
                    " style="width: 18px;">
                                    <label>
                                        <input type="checkbox" class="checkAll">
                                    </label>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd">
                                <td>1</td>
                                <td>Tổng Công Ty</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Tổng Công Ty đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#1" class="edit" title="Chỉnh sửa: Tổng Công Ty">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Tổng Công Ty đang được hiển thị rồi.!');" title="Tổng Công Ty đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#1" class="hiddens" title="Ẩn: Tổng Công Ty">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#1" class="delete" title="Xóa: Tổng Công Ty">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Tổng Công Ty">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="1">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>2</td>
                                <td>Trung Tâm Phân Phối Hà Nội 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Hà Nội 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#2" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Hà Nội 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Hà Nội 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Hà Nội 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#2" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Hà Nội 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#2" class="delete" title="Xóa: Trung Tâm Phân Phối Hà Nội 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Hà Nội 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="2">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>3</td>
                                <td>Trung Tâm Phân Phối Sài Gòn 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Sài Gòn 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#3" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Sài Gòn 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Sài Gòn 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Sài Gòn 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#3" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Sài Gòn 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#3" class="delete" title="Xóa: Trung Tâm Phân Phối Sài Gòn 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Sài Gòn 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="3">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>4</td>
                                <td> Trung Tâm Phân Phối Bắc Giang 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="	Trung Tâm Phân Phối Bắc Giang 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#4" class="edit" title="Chỉnh sửa: 	Trung Tâm Phân Phối Bắc Giang 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: 	Trung Tâm Phân Phối Bắc Giang 01 đang được hiển thị rồi.!');" title="	Trung Tâm Phân Phối Bắc Giang 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#4" class="hiddens" title="Ẩn: 	Trung Tâm Phân Phối Bắc Giang 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#4" class="delete" title="Xóa: 	Trung Tâm Phân Phối Bắc Giang 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="	Trung Tâm Phân Phối Bắc Giang 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="4">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>5</td>
                                <td>Trung Tâm Phân Phối Hải Dương 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Hải Dương 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#5" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Hải Dương 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Hải Dương 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Hải Dương 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#5" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Hải Dương 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#5" class="delete" title="Xóa: Trung Tâm Phân Phối Hải Dương 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Hải Dương 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="5">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>6</td>
                                <td>Trung tâm Phân Phối Vĩnh Phúc 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung tâm Phân Phối Vĩnh Phúc 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#6" class="edit" title="Chỉnh sửa: Trung tâm Phân Phối Vĩnh Phúc 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung tâm Phân Phối Vĩnh Phúc 01 đang được hiển thị rồi.!');" title="Trung tâm Phân Phối Vĩnh Phúc 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#6" class="hiddens" title="Ẩn: Trung tâm Phân Phối Vĩnh Phúc 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#6" class="delete" title="Xóa: Trung tâm Phân Phối Vĩnh Phúc 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung tâm Phân Phối Vĩnh Phúc 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="6">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>7</td>
                                <td>Trung Tâm Phân Phối Phú Yên 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Phú Yên 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#7" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Phú Yên 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Phú Yên 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Phú Yên 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#7" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Phú Yên 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#7" class="delete" title="Xóa: Trung Tâm Phân Phối Phú Yên 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Phú Yên 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="7">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>8</td>
                                <td>Trung Tâm Phân Phối Hà Nam 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Hà Nam 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#8" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Hà Nam 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Hà Nam 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Hà Nam 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#8" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Hà Nam 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#8" class="delete" title="Xóa: Trung Tâm Phân Phối Hà Nam 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Hà Nam 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="8">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>9</td>
                                <td>Trung Tâm Phân Phối Phú Thọ 02</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Phú Thọ 02 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#9" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Phú Thọ 02">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Phú Thọ 02 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Phú Thọ 02 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#9" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Phú Thọ 02">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#9" class="delete" title="Xóa: Trung Tâm Phân Phối Phú Thọ 02">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Phú Thọ 02">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="9">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>10</td>
                                <td>Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01 </td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#10" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#10" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#10" class="delete" title="Xóa: Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Phú Thọ 03 Thạch Thất 01	">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="10">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>11</td>
                                <td>Trung Tâm Phân Phối Ba Vì - Hà Nội 68</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Ba Vì - Hà Nội 68 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#11" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Ba Vì - Hà Nội 68">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Ba Vì - Hà Nội 68 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Ba Vì - Hà Nội 68 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#11" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Ba Vì - Hà Nội 68">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#11" class="delete" title="Xóa: Trung Tâm Phân Phối Ba Vì - Hà Nội 68">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Ba Vì - Hà Nội 68">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="11">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>12</td>
                                <td>Trung Tâm Phân Phối Lâm Đồng 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Lâm Đồng 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#12" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Lâm Đồng 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Lâm Đồng 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Lâm Đồng 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#12" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Lâm Đồng 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#12" class="delete" title="Xóa: Trung Tâm Phân Phối Lâm Đồng 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Lâm Đồng 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="12">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>13</td>
                                <td>Trung Tâm Phân Phối Sài Gòn 02</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Sài Gòn 02 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#13" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Sài Gòn 02">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Sài Gòn 02 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Sài Gòn 02 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#13" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Sài Gòn 02">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#13" class="delete" title="Xóa: Trung Tâm Phân Phối Sài Gòn 02">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Sài Gòn 02">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="13">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>14</td>
                                <td>Trung Tâm Phân Phối Bình Thuận 02</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Bình Thuận 02 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#14" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Bình Thuận 02">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Bình Thuận 02 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Bình Thuận 02 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#14" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Bình Thuận 02">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#14" class="delete" title="Xóa: Trung Tâm Phân Phối Bình Thuận 02">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Bình Thuận 02">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="14">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>15</td>
                                <td>Trung Tâm Phân Phối Đồng Nai 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Đồng Nai 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#15" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Đồng Nai 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Đồng Nai 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Đồng Nai 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#15" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Đồng Nai 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#15" class="delete" title="Xóa: Trung Tâm Phân Phối Đồng Nai 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Đồng Nai 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="15">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>16</td>
                                <td>Trung Tâm Phân Phối Sài Gòn 03</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Sài Gòn 03 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#16" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Sài Gòn 03">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Sài Gòn 03 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Sài Gòn 03 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#16" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Sài Gòn 03">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#16" class="delete" title="Xóa: Trung Tâm Phân Phối Sài Gòn 03">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Sài Gòn 03">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="16">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>17</td>
                                <td>Trung Tâm Phân Phối Hà Nội 03</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Hà Nội 03 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#17" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Hà Nội 03">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Hà Nội 03 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Hà Nội 03 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#17" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Hà Nội 03">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#17" class="delete" title="Xóa: Trung Tâm Phân Phối Hà Nội 03">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Hà Nội 03">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="17">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>18</td>
                                <td>Trung Tâm Phân Phối Khánh Hòa 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Khánh Hòa 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#18" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Khánh Hòa 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Khánh Hòa 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Khánh Hòa 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#18" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Khánh Hòa 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#18" class="delete" title="Xóa: Trung Tâm Phân Phối Khánh Hòa 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Khánh Hòa 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="18">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td>19</td>
                                <td>Trung Tâm Phân Phối Ninh Bình 01</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Ninh Bình 01 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#19" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Ninh Bình 01">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Ninh Bình 01 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Ninh Bình 01 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#19" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Ninh Bình 01">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#19" class="delete" title="Xóa: Trung Tâm Phân Phối Ninh Bình 01">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Ninh Bình 01">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="19">
                                    </label>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td>20</td>
                                <td>Trung Tâm Phân Phối Thanh Hóa 03</td>
                                <td> <img src="/Content/Admin/images/gridview/approved.gif" border="0" title="Trung Tâm Phân Phối Thanh Hóa 03 đang hiển thị">
                                </td>
                                <td class="act_delete">
                                    <a href="#20" class="edit" title="Chỉnh sửa: Trung Tâm Phân Phối Thanh Hóa 03">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:Example.show('Thông báo: Trung Tâm Phân Phối Thanh Hóa 03 đang được hiển thị rồi.!');" title="Trung Tâm Phân Phối Thanh Hóa 03 đang được hiển thị">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a href="#20" class="hiddens" title="Ẩn: Trung Tâm Phân Phối Thanh Hóa 03">
                                        <i class="fa fa-exclamation-circle"></i>
                                    </a>
                                    <a href="#20" class="delete" title="Xóa: Trung Tâm Phân Phối Thanh Hóa 03">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="act_roles" title="Trung Tâm Phân Phối Thanh Hóa 03">
                                    <label>
                                        <input type="checkbox" class="minimal check" value="20">
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_info" id="tblContent_info" role="status" aria-live="polite">Showing 1 to 20 of 32 entries</div>
                        </div>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="tblContent_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" aria-controls="tblContent" tabindex="0" id="tblContent_previous"><a href="#">Previous</a></li>
                                    <li class="paginate_button active" aria-controls="tblContent" tabindex="0"><a href="#">1</a></li>
                                    <li class="paginate_button " aria-controls="tblContent" tabindex="0"><a href="#">2</a></li>
                                    <li class="paginate_button next" aria-controls="tblContent" tabindex="0" id="tblContent_next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection