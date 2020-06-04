<section class="fillter-area  mb-5">
    <div class="fillter-title">
        <h4>Bộ lọc</h4>
    </div>
    <div class="fillter-form">
        <form action="{{ $config['url'] }}" method="get">
            @php($count = 0)
            @foreach ($config['partials'] as $key => $item)
                @php($count++)
                @if ($count % 2 === 1)
                    <div class="d-flex container pt-3">
                @endif
                    <div class="form-group col-md-6 col-12 d-flex justify-content-around align-items-center">
                        <span for="" class="fillter-name col-4">{{ $item['label'] }}</span>
                        <select class="form-control col-8 {{ $item['select2'] === true ? 'select2' : '' }}" name="{{ $key }}" id="{{ $key }}">
                            <option value="0" selected>Chọn loại hình cơ sở</option>
                            @foreach($item['options'] as $optionKey => $optionValue)
                                <option value="{{ $optionKey }}">{{ $optionValue }}</option>
                            @endforeach
                        </select>
                    </div>
                @if ($count % 2 === 0 || $count === count($config['partials']))
                    </div>
                @endif
            @endforeach

            <div class="d-flex justify-content-between container pt-3 mb-5 col-3">
                <button type="submit" class="btn btn-primary btn-fillter">Tìm kiếm</button>
                <button type="submit" class="btn btn-danger btn-fillter ml-5">Hủy</button>
            </div>
        </form>
    </div>
</section>
