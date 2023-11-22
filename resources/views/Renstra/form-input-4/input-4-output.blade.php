@extends('main.index')
@section('index')
    <div class="container py-5">
        <div class=" mb-3 py-4 d-flex justify-content-center" style="background: white">
            <div style="flex:1;">
                @include('Component.step-4')
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div style="flex:1;">
                <div class="p-3" style="background: white";>
                    <p class="mb-2" style="font-size: 17px; font-weight:bold;">Output </p>
                    <form action="/create-4/output/add" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="select-periode-6">Periode</label>
                            <select required id="select-periode-6" class="form-select mb-3"
                                aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                name="selectPeriode">
                                <option selected value="">Select Periode...</option>
                                @foreach ($periodes as $periode)
                                    <option value={{ $periode->id_periode }}>
                                        {{ $periode->roadmap }}
                                        ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }})
                                        <br>
                                        *{{ $periode->flag_column_keterangan }} tingkat
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select-outcome-3">Outcome</label>
                            <select id="select-outcome-3" class="form-select" aria-label=".form-select-lg example"
                                style="max-width:auto; width:auto;" name="selectOutcome">
                                <option selected value="">Select Outcome...</option>
                                @foreach ($outcomes as $outcome)
                                    <option value={{ $outcome->id_outcome }}>
                                        {{ $outcome->strategi_outcome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" id="fieldOutput">
                            <div class="d-flex mb-2" style="gap: 5%">
                                <label class="col-8" for="input_output">Output</label>
                                <a class="btn col-1" id="addField" style="background:#008800; color:white;">Add Field</a>
                            </div>
                            <textarea required class="form-control mb-2" id="input_output" aria-label="With textarea" style="width: 80%;"
                                name="input_output[]" placeholder="Masukkan Strategi..."></textarea>
                        </div>
                        <div class="d-flex justify-content-center align-items-center" style="gap: 1%;">
                            <a href="/create-4/indikator-outcome" class="btn btnAdd" style="background:#008800; color:white;">
                                Back </a>
                            <button type="submit" class="btn btnAdd" style="background:#008800; color:white;">
                                Save
                            </button>
                        </div class="d-flex justify-content-center align-items-center" style="gap: 1%;">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#select-periode-6').change(function() {
                var periodeId = $(this).val();
                $.ajax({
                    url: '/get-outcome/' + periodeId,
                    type: 'GET',
                    success: function(data) {
                        $('#select-outcome-3').empty();
                        $.each(data, function(key, value) {
                            $('#select-outcome-3').append('<option value="' + key +
                                '">' + value + '</option>');
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#addField').click(function(event) {
                event.preventDefault();
                $('#fieldOutput').append(
                    '<div class="d-flex mb-2"> <textarea required class="form-control" id="input_output" aria-label="With textarea" style="width: 80%;" name="input_output[]" placeholder="Masukkan Strategi..."></textarea> <button class="btn ms-2 removeField" style="background:red; color:white;"> Remove </button></div>'
                )
            });
        });

        $(document).on('click', '.removeField', function(e) {
            e.preventDefault();
            let row_item = $(this).parent();
            $(row_item).remove();
        });
    </script>
@endsection
