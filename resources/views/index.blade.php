@extends('layouts.admin')
@section('title', "Dashboard")
@section('content')
<div class="m-content">
 
    {{-- <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ tăng trưởng tuyển sinh
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div  id="m_flotcharts_2" style="height: 300px; padding: 0px; position: relative;">
                        <canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 900px; height: 300px;"></canvas>
                        <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                            <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 60px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 120px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 180px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 240px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">8</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 300px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 360px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 420px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 480px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">16</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 540px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">18</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 600px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 660px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">22</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 720px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 780px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">26</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 840px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">28</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 900px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div>
                            </div>
                            <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 10px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 249px; left: 8px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 228px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 208px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 187px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 166px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 145px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 125px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 104px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">80</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 83px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">90</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 62px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 42px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">110</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 21px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">120</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">130</font></font></div>
                            </div>
                        </div>
                        <canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 900px; height: 300px;"></canvas>
                        <div class="legend">
                            <div style="position: absolute; width: 85.6px; height: 35.2px; top: 13px; right: 12px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                            <table style="position:absolute;top:13px;right:12px;;font-size:smaller;color:#545454">
                                <tbody>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div style="width:4px;height:0;border:5px solid rgb(209,38,16);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lượt truy cập duy nhất</font></font></td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div style="width:4px;height:0;border:5px solid rgb(55,183,243);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lượt xem trang</font></font></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ thống kê số lượng cơ sở đào tạo Quý 1/2020
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_flotcharts_5" style="height: 350px; padding: 0px; position: relative;">
                        <canvas
                            class="flot-base"
                            width="1433"
                            height="437"
                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 900px; height: 350px;">
                        </canvas>
                        <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                            <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 43px; text-align: center;">
                                    <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">0</font>
                                    </font>
                                </div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 100px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 180px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 260px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 340px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 420px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 500px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 580px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 660px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">8</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 740px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 820px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div>
                            </div>
                            <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 320px; left: 8px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 274px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 229px; left: 2px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 183px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 137px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 91px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 46px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div>
                                <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 2px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></div>
                            </div>
                        </div>
                        <canvas class="flot-overlay" width="1433" height="437" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 900px; height: 350px;"></canvas>
                        <div class="legend">
                            <div style="position: absolute; width: 46.4px; height: 52.8px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                            <table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454">
                                <tbody>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">bán hàng</font></font></td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thuế</font></font></td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div>
                                            </div>
                                        </td>
                                        <td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lợi nhuận</font></font></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div> --}}
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Bảng thống kê số lượng báo cáo theo đơn vị thực hiện
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Datatable -->
            <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_scroll">
                            <div class="dataTables_scrollBody"
                                style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                                <table
                                    class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer"
                                    id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1133px;">
                                    <thead>
                                        <tr role="row" style="">
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Record ID
                                                </div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Order ID</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Country</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Ship City
                                                </div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Ship Address
                                                </div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Company Agent
                                                </div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Company Name
                                                </div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Ship Date
                                                </div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Status</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Type</div>
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1"
                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; ">
                                                <div class="dataTables_sizing" style=" overflow: hidden;">Actions</div>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>61715-075</td>
                                            <td>China</td>
                                            <td>Tieba</td>
                                            <td>746 Pine View Junction</td>
                                            <td>Nixie Sailor</td>
                                            <td>Gleichner, Ziemann and Gutkowski</td>
                                            <td>2/12/2018</td>
                                            <td><span class="m-badge m-badge--primary m-badge--wide">Canceled</span>
                                            </td>
                                            <td><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-primary">Retail</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">2</td>
                                            <td>63629-4697</td>
                                            <td>Indonesia</td>
                                            <td>Cihaur</td>
                                            <td>01652 Fulton Trail</td>
                                            <td>Emelita Giraldez</td>
                                            <td>Rosenbaum-Reichel</td>
                                            <td>8/6/2017</td>
                                            <td><span class="m-badge m-badge--danger m-badge--wide">Danger</span></td>
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">3</td>
                                            <td>68084-123</td>
                                            <td>Argentina</td>
                                            <td>Puerto Iguazú</td>
                                            <td>2 Pine View Park</td>
                                            <td>Ula Luckin</td>
                                            <td>Kulas, Cassin and Batz</td>
                                            <td>5/26/2016</td>
                                            <td><span class="m-badge m-badge--brand m-badge--wide">Pending</span></td>
                                            <td><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-primary">Retail</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">4</td>
                                            <td>67457-428</td>
                                            <td>Indonesia</td>
                                            <td>Talok</td>
                                            <td>3050 Buell Terrace</td>
                                            <td>Evangeline Cure</td>
                                            <td>Pfannerstill-Treutel</td>
                                            <td>7/2/2016</td>
                                            <td><span class="m-badge m-badge--brand m-badge--wide">Pending</span></td>
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">5</td>
                                            <td>31722-529</td>
                                            <td>Austria</td>
                                            <td>Sankt Andrä-Höch</td>
                                            <td>3038 Trailsway Junction</td>
                                            <td>Tierney St. Louis</td>
                                            <td>Dicki-Kling</td>
                                            <td>5/20/2017</td>
                                            <td><span class="m-badge m-badge--metal m-badge--wide">Delivered</span></td>
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">6</td>
                                            <td>64117-168</td>
                                            <td>China</td>
                                            <td>Rongkou</td>
                                            <td>023 South Way</td>
                                            <td>Gerhard Reinhard</td>
                                            <td>Gleason, Kub and Marquardt</td>
                                            <td>11/26/2016</td>
                                            <td><span class="m-badge m-badge--info m-badge--wide">Info</span></td>
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">7</td>
                                            <td>43857-0331</td>
                                            <td>China</td>
                                            <td>Baiguo</td>
                                            <td>56482 Fairfield Terrace</td>
                                            <td>Englebert Shelley</td>
                                            <td>Jenkins Inc</td>
                                            <td>6/28/2016</td>
                                            <td><span class="m-badge m-badge--metal m-badge--wide">Delivered</span></td>
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">8</td>
                                            <td>64980-196</td>
                                            <td>Croatia</td>
                                            <td>Vinica</td>
                                            <td>0 Elka Street</td>
                                            <td>Hazlett Kite</td>
                                            <td>Streich LLC</td>
                                            <td>8/5/2016</td>
                                            <td><span class="m-badge m-badge--danger m-badge--wide">Danger</span></td>
                                            <td><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-danger">Online</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">9</td>
                                            <td>0404-0360</td>
                                            <td>Colombia</td>
                                            <td>San Carlos</td>
                                            <td>38099 Ilene Hill</td>
                                            <td>Freida Morby</td>
                                            <td>Haley, Schamberger and Durgan</td>
                                            <td>3/31/2017</td>
                                            <td><span class="m-badge m-badge--metal m-badge--wide">Delivered</span></td>
                                            <td><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-danger">Online</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">10</td>
                                            <td>52125-267</td>
                                            <td>Thailand</td>
                                            <td>Maha Sarakham</td>
                                            <td>8696 Barby Pass</td>
                                            <td>Obed Helian</td>
                                            <td>Labadie, Predovic and Hammes</td>
                                            <td>1/26/2017</td>
                                            <td><span class="m-badge m-badge--brand m-badge--wide">Pending</span></td>
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span
                                                    class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#"
                                                        class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i>
                                                            Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i>
                                                            Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i>
                                                            Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#"
                                                    class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill"
                                                    title="View">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                        Biểu đồ thống kê tỷ lệ các thành phần sinh viên
                                    </font>
                                </font>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div attr="{{$data}}" id="m_flotcharts_8" style="height: 300px; padding: 0px; position: relative;">
                        <canvas class="flot-base" width="662" height="375"
                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 529.9px; height: 300px;"></canvas><canvas
                            class="flot-overlay" width="662" height="375"
                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 529.9px; height: 300px;"></canvas>
                        <div class="legend">
                            <div
                                style="position: absolute; width: 56.8px; height: 88px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                            </div>
                            <table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454">
                                <tbody>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Sê-ri1</font>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Sê-ri 2</font>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Sê-ri 3</font>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(77,167,77);overflow:hidden">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Sê-ri4</font>
                                            </font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="legendColorBox">
                                            <div style="border:1px solid #ccc;padding:1px">
                                                <div
                                                    style="width:4px;height:0;border:5px solid rgb(148,64,237);overflow:hidden">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="legendLabel">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Sê-ri5</font>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    console.log(JSON.parse($('#m_flotcharts_8').attr('attr')))
</script>
<script src="{!! asset('assets/vendors/custom/flot/flot.bundle.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/demo/custom/components/charts/flotcharts.js') !!}" type="text/javascript"></script>
@endsection