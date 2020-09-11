@extends('base')
<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>


@section('main')
<div class="container-fluid">
  <div>
     <a style="margin: 20 0 20;" href="{{ route('coronavirus_cases.create')}}" class="btn btn-success">New case</a>
  </div>
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#main_table_countries_today" aria-expanded="true" aria-controls="main_table_countries_today">
      Today
    </button>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#main_table_countries_yesterday" aria-expanded="false" aria-controls="main_table_countries_yesterday">
      Yesterday
    </button>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#main_table_countries_yesterday2" aria-expanded="false" aria-controls="main_table_countries_yesterday2">
      2 days ago
    </button>
  </div>
  <h1 class="display-3">Case</h1>
  <div id="accordion" id="table_countries_today">
    <table id="main_table_countries_today" class="table table-striped table-responsive-sm collapse show" data-parent="#accordion">
      <thead>
        <tr>
          <th>ID</th>
          <th>Country</th>
          <th>Total Cases</th>
          <th>New Cases</th>
          <th>Total Deaths</th>
          <th>New Deaths</th>
          <th>Total Recovered</th>
          <th>Active Cases</th>
          <th>Critical</th>
          <th>Tot Cases/<br>1M pop</th>
          <th>Deaths/<br>1M pop</th>
          <th>Total Tests</th>
          <th>Tests/<br>1M pop</th>
          <th>Population</th>
          <th>1 Case<br>every X ppl</th>
          <th>1 Death<br>every X ppl</th>
          <th>1 Test<br>every X ppl</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    </table>
    <table id="main_table_countries_yesterday" class="table table-striped collapse" data-parent="#accordion">
      <thead>
        <tr>
          <th>ID</th>
          <th>Country</th>
          <th>Total Cases</th>
          <th>New Cases</th>
          <th>Total Deaths</th>
          <th>New Deaths</th>
          <th>Total Recovered</th>
          <th>Active Cases</th>
          <th>Critical</th>
          <th>Tot Cases/<br>1M pop</th>
          <th>Deaths/<br>1M pop</th>
          <th>Total Tests</th>
          <th>Tests/<br>1M pop</th>
          <th>Population</th>
          <th>1 Case<br>every X ppl</th>
          <th>1 Death<br>every X ppl</th>
          <th>1 Test<br>every X ppl</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    </table>
    <table id="main_table_countries_yesterday2" class="table table-striped collapse" data-parent="#accordion">
      <thead>
        <tr>
          <th>ID</th>
          <th>Country</th>
          <th>Total Cases</th>
          <th>New Cases</th>
          <th>Total Deaths</th>
          <th>New Deaths</th>
          <th>Total Recovered</th>
          <th>Active Cases</th>
          <th>Critical</th>
          <th>Tot Cases/<br>1M pop</th>
          <th>Deaths/<br>1M pop</th>
          <th>Total Tests</th>
          <th>Tests/<br>1M pop</th>
          <th>Population</th>
          <th>1 Case<br>every X ppl</th>
          <th>1 Death<br>every X ppl</th>
          <th>1 Test<br>every X ppl</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- <table  class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Country</td>
          <td>Total Cases</td>
          <td>New Cases</td>
          <td>Total Deaths</td>
          <td>New Deaths</td>
          <td>Total Recovered</td>
          <td>Active Cases</td>
          <td>Critical</td>
          <td>Tot Cases/1M pop</td>
          <td>Deaths/1M pop</td>
          <td>Total Tests</td>
          <td>Tests/1M pop</td>
          <td>Population</td>
          <td colspan="2">Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cases as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->country}}</td>
            <td>{{$case->total_cases}}</td>
            <td>{{$case->new_cases}}</td>
            <td>{{$case->total_deaths}}</td>
            <td>{{$case->new_deaths}}</td>
            <td>{{$case->total_recovered}}</td>
            <td>{{$case->active_cases}}</td>
            <td>{{$case->critical}}</td>
            <td>{{$case->tot_cases}}</td>
            <td>{{$case->deaths}}</td>
            <td>{{$case->total_tests}}</td>
            <td>{{$case->tests}}</td>
            <td>{{$case->population}}</td>
            <td>
                <a href="{{ route('coronavirus_cases.edit',$case->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('coronavirus_cases.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table> -->
  <script>
  function remove(id) {
    $.ajax({
        url: 'api/coronavirus_cases/' + id,
        method: 'DELETE',
        success: function(result) {
            window.location.href="coronavirus_cases";
            alert("Case deleted!");
        },
        error: function(request,msg,error) {
            // handle failure
        }
    });
  }
  $(document).ready(function() {
    let table = $('#main_table_countries_today').DataTable({
        dom: 'Bfrtip',
        buttons: [
          {
            extend: 'colvis',
            text: "Columns",
          }
        ],
        fixedHeader: true,
        //order:[[0, 'asc']], //asc, desc
        lengthMenu: [[10, 25, 50], [10, 25, 50]], //[[10, 25, 50, -1], [10, 25, 50, "All"]]
        data: [
          [1,'USA',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [2,'VIE',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [3,'MYM',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [4,'THAI',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [5,'CHA',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [6,'KOR',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [7,'JPN',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [8,'LAO',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [9,'CAM',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [10,'FRA',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
          [11,'ENG',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'',''],
        ]
        // ajax: {
        //     url: 'api/coronavirus_cases',
        //     type: 'GET',
        //     dataSrc: ''
        // },
        // columns: [
        //     {
        //         render: function ( data, type, full, meta ) {
        //             return  meta.row + 1;
        //         }
        //     },
        //     {
        //         data: 'country',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'total_cases',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'new_cases',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'total_deaths',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'new_deaths',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'total_recovered',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'active_cases',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'critical',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'tot_cases',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'deaths',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'total_tests',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'tests',
        //         defaultContent: '',
        //     },
        //     {
        //         data: 'population',
        //         defaultContent: '',
        //     },
        //     {
        //         visible: false,
        //         data: '1_case',
        //         defaultContent: '',
        //     },
        //     {
        //         visible: false,
        //         data: '1_death',
        //         defaultContent: '',
        //     },
        //     {
        //         visible: false,
        //         data: '1_test',
        //         defaultContent: '',
        //     },
        //     {
        //         orderable: false,
        //         render: function (data, type, row, meta) {
        //           return `<a href="/coronavirus_cases/${row.id}/edit" class="btn-sm btn-info">Edit</a>`;
        //         }
        //     },
        //     {
        //         orderable: false,
        //         render: function (data, type, row, meta) {
        //           return `<a class="btn-sm btn-danger" onclick="remove(\'${row.id}\')">Delete</a>`;
        //         }
        //     }
        // ]
    });
  });
  </script>
</div>
@endsection
