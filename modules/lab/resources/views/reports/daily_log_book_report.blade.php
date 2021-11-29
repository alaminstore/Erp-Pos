@extends('lab::layout')
@section('content')
	<div class="padding">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header text-center">
						<h2>Daily Log Book Report || {{ date("jS F, Y", strtotime($date)) }}
							<span class="pull-right">
								<a href="{{ url('/daily-log-book-report-download?type=pdf&date='.$date) }}" ><i style="color: #DC0A0B" class="fa fa-file-pdf-o"></i></a> |
								<a href="{{ url('/daily-log-book-report-download?type=xls&date='.$date) }}" ><i style="color: #0F733B" class="fa fa-file-excel-o"></i></a>
							</span>
						</h2>
					</div>
					<div class="box-divider m-a-0"></div>
					<div class="box-body">
						{!! Form::open(['url' => '/daily-log-book-report', 'method' => 'GET']) !!}
							<div class="form-group">
								<div class="row m-b">
									<div class="col-sm-3">
										{!! Form::date('date', $date ?? null, ['class' => 'form-control']) !!}
									</div>
									<div class="col-sm-2">
										<button type="submit" class="btn btn-primary form-control">Search</button>
									</div>
								</div>
							</div>
						{!! Form::close() !!}
						
						<div class="table-responsive">
							<table class="reportTable">
								@includeIf('lab::reports.includes.daily_log_book_report_table')
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
