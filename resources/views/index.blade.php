@extends('layouts.admin')
@section('title', "Dashboard")
@section('content')
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            {{-- <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ cơ bản
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_flotcharts_1" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 229px; top: 283px; left: 20px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0,0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 229px; top: 283px; left: 298px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2/2</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 229px; top: 283px; left: 582px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">π</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 229px; top: 283px; left: 852px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3π / 2</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-2.0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 236px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-1,5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 203px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-1,0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 169px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-0,5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 6px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0,0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 101px; left: 6px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0,5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 10px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 34px; left: 10px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1,5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2.0</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 51.2px; height: 52.8px; top: 13px; right: 16px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:16px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tội lỗi (x)</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cos (x)</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tan (x)</font></font></td></tr></tbody></table></div></div>
                </div>
            </div> --}}

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
                                Biểu đồ tăng trưởng tuyển sinh
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    {{-- <div tuyen_sinh = "{{$data_json_tuyen_sinh}}" tot_nghiep = "{{$data_json_tot_nghiep}}" id="m_flotcharts_2" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 58px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 135px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 212px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 289px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">số 8</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 365px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 442px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 519px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 596px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">16</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 673px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">18</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 748px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 826px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">22</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 903px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 980px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">26</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 1057px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">28</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 1134px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 10px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 249px; left: 8px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 228px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 208px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 187px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 166px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 145px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 125px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 104px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">80</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 83px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">90</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 62px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 42px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">110</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 21px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">120</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">130</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 85.6px; height: 35.2px; top: 13px; right: 12px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:12px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(209,38,16);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lượt truy cập duy nhất</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(55,183,243);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lượt xem trang</font></font></td></tr></tbody></table></div></div> --}}
                    <div  id="m_flotcharts_2" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 58px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 135px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 212px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 289px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">số 8</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 365px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 442px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 519px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 596px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">16</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 673px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">18</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 748px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 826px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">22</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 903px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">24</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 980px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">26</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 1057px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">28</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 71px; top: 283px; left: 1134px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 10px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 249px; left: 8px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 228px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 208px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 187px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 166px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 145px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 125px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 104px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">80</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 83px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">90</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 62px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 42px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">110</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 21px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">120</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">130</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 85.6px; height: 35.2px; top: 13px; right: 12px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:12px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(209,38,16);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lượt truy cập duy nhất</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(55,183,243);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lượt xem trang</font></font></td></tr></tbody></table></div></div>
                </div>
            </div>

            <!--end::Portlet-->

            <!--begin::Portlet-->
            {{-- <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Đường cong theo dõi
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_flotcharts_3" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 24px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 105px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 183px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 262px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 341px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 421px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 500px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 580px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 659px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">số 8</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 739px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 817px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 898px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">11</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 976px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 76px; top: 283px; left: 1055px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">13</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 248px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-1,0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 191px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-0,5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 6px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0,0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 79px; left: 6px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0,5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 22px; left: 10px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 89.6px; height: 35.2px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel" style="width: 71.6px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">tội lỗi (x) = -0,00</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel" style="width: 69.2px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cos (x) = -0,00</font></font></td></tr></tbody></table></div></div>
                </div>
            </div> --}}

            <!--end::Portlet-->

            <!--begin::Portlet-->
            {{-- <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ động
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_flotcharts_4" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 284px; left: 9px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0%</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 227px; left: 3px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20%</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 170px; left: 3px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40%</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 114px; left: 3px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60%</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 57px; left: 3px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">80%</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 0px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100%</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas></div>
                </div>
            </div> --}}

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
                    <canvas class="flot-base" width="1433" height="437" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 350px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 43px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 152px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 257px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 363px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 470px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 576px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 683px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 790px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">7</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 896px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">số 8</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 1002px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">9</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 88px; top: 333px; left: 1108px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 320px; left: 8px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 274px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 229px; left: 2px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 183px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 137px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 91px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 46px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 2px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="437" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 350px;"></canvas><div class="legend"><div style="position: absolute; width: 46.4px; height: 52.8px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">bán hàng</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thuế</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lợi nhuận</font></font></td></tr></tbody></table></div></div>
                    {{-- <div class="btn-toolbar m--margin-top-20 m--margin-bottom-20">
                        <div class="btn-group stackControls">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="button" class="btn btn-success" value="Với xếp chồng "></font></font>
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="button" class="btn btn-danger" value="mà không cần xếp chồng"></font></font>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="btn-group graphControls">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="button" class="btn btn-primary" value="Bars "></font></font>
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="button" class="btn btn-brand" value="Lines "></font></font>
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="button" class="btn btn-warning" value="Lines với các bước"></font></font>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!--end::Portlet-->

            <!--begin::Portlet-->
            {{-- <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ tương tác
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_flotcharts_6" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 79px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 191px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">4</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 304px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">6</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 416px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">số 8</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 527px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 640px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">12</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 752px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">14</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 864px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">16</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 977px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">18</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 95px; top: 283px; left: 1088px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 14px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 216px; left: 7px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 162px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 108px; left: 4px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">150</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 54px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">200</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">250</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas></div>
                </div>
            </div> --}}

            <!--end::Portlet-->

            <!--begin::Portlet-->
            {{-- <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ cột
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div id="m_flotcharts_7" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 17px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 129px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 239px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 351px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">15</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 461px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 573px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">25</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 685px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 797px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">35</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 909px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 1021px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">45</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 104px; top: 283px; left: 1132px; text-align: center;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 8px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 225px; left: 5px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">10</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 180px; left: 2px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">20</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">30</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 90px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">40</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 45px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">50</font></font></div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">60</font></font></div></div></div><canvas class="flot-overlay" width="1433" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1147px; height: 300px;"></canvas></div>
                </div>
            </div> --}}

            <!--end::Portlet-->
        </div>
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Bảng thống kê số lượng báo cáo theo đơn  vị thực hiện
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
                            <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1129.6px; padding-right: 17px;">
                                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer" role="grid" style="margin-left: 0px; width: 1129.6px;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 46.45px;" aria-sort="ascending" aria-label="Record ID: activate to sort column descending">Record ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 37.65px;" aria-label="Order ID: activate to sort column ascending">Order ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 61.65px;" aria-label="Country: activate to sort column ascending">Country</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 74.45px;" aria-label="Ship City: activate to sort column ascending">Ship City</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 91.25px;" aria-label="Ship Address: activate to sort column ascending">Ship Address</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 79.25px;" aria-label="Company Agent: activate to sort column ascending">Company Agent</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 112.85px;" aria-label="Company Name: activate to sort column ascending">Company Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 40.05px;" aria-label="Ship Date: activate to sort column ascending">Ship Date</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 55.25px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 32.05px;" aria-label="Type: activate to sort column ascending">Type</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 70.1px;" aria-label="Actions">Actions</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                                <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer" id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1133px;">
                                    <thead>
                                        <tr role="row" style="height: 0px;">
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 46.45px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Record ID</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 37.65px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Order ID</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 61.65px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Country</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 74.45px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Ship City</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 91.25px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Ship Address</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 79.25px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Company Agent</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 112.85px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Company Name</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 40.05px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Ship Date</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 55.25px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Status</div>
                                            </th>
                                            <th class="sorting" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 32.05px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Type</div>
                                            </th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 70.1px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Actions</div>
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
                                            <td><span class="m-badge m-badge--primary m-badge--wide">Canceled</span></td>
                                            <td><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--primary m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-primary">Retail</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-danger">Online</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                                            <td><span class="m-badge m-badge--accent m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-accent">Direct</span></td>
                                            <td nowrap="">
                                                <span class="dropdown">
                                                    <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                                        <i class="la la-ellipsis-h"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                    </div>
                                                </span>
                                                <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
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
                        <h3  class="m-portlet__head-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Biểu đồ thống kê tỷ lệ các thành phần sinh viên
                            </font></font></h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div attr ="{{$data}}" id="m_flotcharts_8" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="662" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 529.9px; height: 300px;"></canvas><canvas class="flot-overlay" width="662" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 529.9px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 56.8px; height: 88px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sê-ri1</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sê-ri 2</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sê-ri 3</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(77,167,77);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sê-ri4</font></font></td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(148,64,237);overflow:hidden"></div></div></td><td class="legendLabel"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sê-ri5</font></font></td></tr></tbody></table></div></div>
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