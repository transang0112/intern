@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a case</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('coronavirus_cases.store') }}">
          @csrf
          <div class="form-group">
              <label for="country">Country:</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          <div class="form-group">
              <label for="total_cases">Total Cases:</label>
              <input type="text" class="form-control" name="total_cases"/>
          </div>
          <div class="form-group">
              <label for="new_cases">New Cases:</label>
              <input type="text" class="form-control" name="new_cases"/>
          </div>
          <div class="form-group">
              <label for="total_deaths">Total Deaths:</label>
              <input type="text" class="form-control" name="total_deaths"/>
          </div>
          <div class="form-group">
              <label for="new_deaths">New Deaths:</label>
              <input type="text" class="form-control" name="new_deaths"/>
          </div>
          <div class="form-group">
              <label for="total_recovered">Total Recovered:</label>
              <input type="text" class="form-control" name="total_recovered"/>
          </div>
          <div class="form-group">
              <label for="active_cases">Active Cases:</label>
              <input type="text" class="form-control" name="active_cases"/>
          </div>
          <div class="form-group">
              <label for="critical">Critical:</label>
              <input type="text" class="form-control" name="critical"/>
          </div>
          <div class="form-group">
              <label for="tot_cases">Tot Cases/<br>1M pop:</label>
              <input type="text" class="form-control" name="tot_cases"/>
          </div>
          <div class="form-group">
              <label for="deaths">Deaths/<br>1M pop:</label>
              <input type="text" class="form-control" name="deaths"/>
          </div>
          <div class="form-group">
              <label for="total_tests">Total Tests:</label>
              <input type="text" class="form-control" name="total_tests"/>
          </div>
          <div class="form-group">
              <label for="tests">Tests/<br>1M pop:</label>
              <input type="text" class="form-control" name="tests"/>
          </div>
          <div class="form-group">
              <label for="population">Population:</label>
              <input type="text" class="form-control" name="population"/>
          </div>
          <div class="form-group">
              <label for="1_case">1 Case<br>every X ppl:</label>
              <input type="text" class="form-control" name="1_case"/>
          </div>
          <div class="form-group">
              <label for="1_death">1 Death<br>every X ppl:</label>
              <input type="text" class="form-control" name="1_death"/>
          </div>
          <div class="form-group">
              <label for="1_test">1 Test<br>every X ppl:</label>
              <input type="text" class="form-control" name="1_test"/>
          </div>
          <button type="submit" class="btn btn-primary">Add case</button>
      </form>
  </div>
</div>
</div>
@endsection
