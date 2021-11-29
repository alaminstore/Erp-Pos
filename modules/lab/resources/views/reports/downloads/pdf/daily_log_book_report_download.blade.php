<style type="text/css">
	/* table style */
	.reportTable {
		margin-bottom: 1rem;
		width: 100%;
		max-width: 100%;
	}
	
	.reportTable thead,
	.reportTable tbody,
	.reportTable th {
		padding: 0px;
		font-size: 12px;
		text-align: center;
	}
	
	.reportTable th,
	.reportTable td {
		border: 1px solid #363636;
	}
	
	.table td, .table th {
		padding: 0.1rem;
		vertical-align: center;
	}
</style>
<table class="reportTable" style="border: 1px solid black; border-collapse: collapse;" cellpadding="3">
	@includeIf('lab::reports.includes.daily_log_book_report_table')
</table>