
@extends('layouts.master')

@section('title', 'SB Admin 2 - Dashboard')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="box-document">
                <div class="header-document">
                    <h4 class="heading-doccument">Tài liệu</h4>
                </div>
                <div class="body-document">
                    <form id="frmSearch">
                        <table class="table table-bordered table-striped" id="searchTable">
                            <tbody>
                                <tr>
                                    <td>Từ khóa </td>
                                    <td><input type="text" id="Keyword" class="form-control" name="Keyword" placeholder="Từ khóa"></td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="2">
                                        <a class="btn btn-primary text-light" id="btnFill">Tìm kiếm</a>
                                        <a class="btn btn-primary  text-light" id="btnExport">Xuất file</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </form>
                    <div class="document-items">
                        <div class="row">
                            <div class=" col-lg-4 col-12 col-sm-12">
                                <div class="box-document-item">
                                    <div class="document-img">
                                        <a title="ảnh sản phẩm sữa non colostrum" href="https://forvietvn.com/Uploads/Mediums/2020/6/17//20200617162706_colostrum.jpg" class="img-thumbnail">
                                            <img alt="ảnh sản phẩm sữa non colostrum" src="https://forvietvn.com/Uploads/Mediums/2020/6/17//20200617162706_colostrum.jpg"></a>
                                    </div>
                                    <div class="document-text">
                                            <h3>
                                                    <a title="ảnh sản phẩm sữa non colostrum" href="//Uploads/Client/Member86/file/20200617162755colostrum.jpg">ảnh sản phẩm sữa non colostrum </a>
                                            </h3>
                                            <p>
                                                
                                            </p>
                                                <a href="/Uploads/Client/Member86/file/20200617162755colostrum.jpg" target="_blank" class="btn btn-success btn-sm">Download</a>
                                        </div>
                                </div>
                            </div>
                            <div class=" col-lg-4 col-12 col-sm-12">
                                <div class="box-document-item">
                                    <div class="document-img">
                                        <a title="ảnh sản phẩm sữa non colostrum" href="https://forvietvn.com/Uploads/Mediums/2020/6/17//20200617162706_colostrum.jpg" class="img-thumbnail">
                                            <img alt="ảnh sản phẩm sữa non colostrum" src="https://forvietvn.com/Uploads/Mediums/2020/6/17//20200617162706_colostrum.jpg"></a>
                                    </div>
                                    <div class="document-text">
                                            <h3>
                                                    <a title="ảnh sản phẩm sữa non colostrum" href="//Uploads/Client/Member86/file/20200617162755colostrum.jpg">ảnh sản phẩm sữa non colostrum </a>
                                            </h3>
                                            <p>
                                                
                                            </p>
                                                <a href="/Uploads/Client/Member86/file/20200617162755colostrum.jpg" target="_blank" class="btn btn-success btn-sm">Download</a>
                                        </div>
                                </div>
                            </div>
                            <div class=" col-lg-4  col-12 col-sm-12">
                                <div class="box-document-item">
                                    <div class="document-img">
                                        <a title="ảnh sản phẩm sữa non colostrum" href="https://forvietvn.com/Uploads/Mediums/2020/6/17//20200617162706_colostrum.jpg" class="img-thumbnail">
                                            <img alt="ảnh sản phẩm sữa non colostrum" src="https://forvietvn.com/Uploads/Mediums/2020/6/17//20200617163100_pedia.jpg"></a>
                                    </div>
                                    <div class="document-text">
                                            <h3>
                                                    <a title="ảnh sản phẩm sữa non colostrum" href="//Uploads/Client/Member86/file/20200617162755colostrum.jpg">ảnh sản phẩm sữa non colostrum </a>
                                            </h3>
                                            <p>
                                                
                                            </p>
                                                <a href="/Uploads/Client/Member86/file/20200617162755colostrum.jpg" target="_blank" class="btn btn-success btn-sm">Download</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @endsection