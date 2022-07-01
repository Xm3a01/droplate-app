<div>
    <div class="card-body">
        <div class="row my-4 justify-content-between">
            {{-- <div class="col-md-3" id="print"><a href="{{ route('reports') }}" class="btn btn-sm btn-info">
                    <i class="fa fa-print"></i> Print</a></div> --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">
                        <form id="filter-form">
                            <label for="">Name</label>
                            <input type="text" name="" placeholder="Name" id="name" class="form-control form-control-sm">
                    </div>
                    {{-- <div class="col-md-2">
                        <label for="">Month</label>
                        <select name="month" id="month" class="form-control form-control-sm">
                            <option value="" selected>Month</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="">dddd</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">Day</label>
                        <select name="" id="day" class="form-control form-control-sm">
                            <option value="" selected>Day</option>
                            <option value="7">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                    </div> --}}
                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-info btn-xs"> <i class="fa fa-filter"></i>
                            Filter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="city-table" class="table table-bordered table-striped">
            <thead class="bg-dark">
                <tr>
                    <th>City Name</th>
                    <th>City Ar Name</th>
                    <th>Queck delivery  price</th>
                    <th>Normal delivery  price</th>
                    <th>Date</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
        </table>
    </div>

</div>
