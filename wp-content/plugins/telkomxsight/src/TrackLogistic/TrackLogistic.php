<?php
/**
 * @package TelkomXsight
 */

namespace Xsight\TrackLogistic;

use Xsight\Interfaces\Feature;
use Xsight\Traits\XsightAPI;

class TrackLogistic implements Feature {

	use XsightAPI;

	public function addParent($parent_menu)
	{
		return;
	}

	public function register_pages()
	{
		return;
	}

	public function register_settings()
	{
		return;
	}

	public function register_hooks()
	{
		return;
	}

	public function register_shortcodes()
	{
		add_shortcode('xsight_track_logistic',[$this, 'generateTrackLogisticPage']);
	}

	public function generateTrackLogisticPage()
	{
		$html = 
		'<form action="" method="GET">
		<p>
			Start Date <br/>
			<input type="date" name="xsight_track_start_date">
		</p>
		<p>
			End Date <br/>
			<input type="date" name="xsight_track_end_date">
		</p>
		<p>
			<input type="submit" name="xsight_logistic_schedule" value="Check Logistic Schedule">
		</p>
		</form>
		<form action="" method="GET">
		<p>
			Container No. <br/>
			<input type="text" name="xsight_track_container_no">
		</p>
		<p>
			<input type="submit" name="xsight_track_container" value="Track Container">
		</p>
		</form>';

		if(isset($_GET['xsight_logistic_schedule']))
		{
			$start_date = sanitize_text_field($_GET['xsight_track_start_date']);
			$end_date = sanitize_textarea_field($_GET['xsight_track_end_date']);

			$response = $this->getVesselSchedule($start_date, $end_date);
			if($response['status'])
			{
				$html.='
				<div style="overflow:auto">
				<table border="1">
					<thead>
						<tr>
							<th>Vessel Name</th>
							<th>Vessel Reference</th>
							<th>Shipping Agent</th>
							<th>ETA</th>
							<th>ETD</th>
							<th>Voyage In</th>
							<th>Voyage Out</th>
							<th>Origin Port</th>
							<th>Final Port</th>
							<th>Last Port</th>
							<th>Next Port</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
				';
				$body = $response['message'];
				foreach ($body->payload as $val) {
					$html .= '
					<tr>
						<td>'.$val->vessel_name.'</td>
						<td>'.$val->vessel_reference.'</td>
						<td>'.$val->shipping_agent.'</td>
						<td>'.$val->eta.'</td>
						<td>'.$val->etd.'</td>
						<td>'.$val->voyage_in.'</td>
						<td>'.$val->voyage_out.'</td>
						<td>'.$val->origin_port.'</td>
						<td>'.$val->final_port.'</td>
						<td>'.$val->last_port.'</td>
						<td>'.$val->next_port.'</td>
						<td>'.$val->status.'</td>
					</tr>';
				}
				$html.='
					</tbody>
				</table>
				</div>';
			}
			else
			{
				$html.="<p>".$response['message']."</p>";
			}
		}
		else if(isset($_GET['xsight_track_container']))
		{
			$container_no = sanitize_text_field($_GET['xsight_track_container_no']);
			$response = $this->getContainerLocation($container_no);
			if($response['status'])
			{
				$html.='
				<div style="overflow:auto">
				<table border="1">
					<thead>
						<tr>
							<th>Container No</th>
							<th>Vessel</th>
							<th>Shipping Line</th>
							<th>Voyage</th>
							<th>ATA</th>
							<th>ATD</th>
							<th>Consignee</th>
							<th>Export/Import</th>
							<th>Full/Empty</th>
							<th>Weight</th>
							<th>Seal ID</th>
							<th>POL</th>
							<th>POD</th>
							<th>Bay Position</th>
							<th>Record Time</th>
							<th>ISO Code</th>
							<th>Size Type</th>
							<th>GIO Time</th>
							<th>DL Time</th>
							<th>Stack</th>
							<th>ETA</th>
							<th>ETD</th>
							<th>Yard</th>
							<th>Last Activity</th>
							<th>Doc Info</th>
							<th>Weight Terminal</th>
							<th>Weight Shipper</th>
							<th>Voyage In</th>
						</tr>
					</thead>
					<tbody>
				';
				$body = $response['message'];
				foreach ($body->payload as $val) {
					$html .= 'val
					<tr>
						<td>'.$val->cotainer_no.'</td>
						<td>'.$val->vessel.'</td>
						<td>'.$val->shipping_line.'</td>
						<td>'.$val->voyage.'</td>
						<td>'.$val->ata.'</td>
						<td>'.$val->atd.'</td>
						<td>'.$val->consignee.'</td>
						<td>'.$val->ex_im.'</td>
						<td>'.$val->full_empty.'</td>
						<td>'.$val->weight.'</td>
						<td>'.$val->seal_id.'</td>
						<td>'.$val->pol.'</td>
						<td>'.$val->pod.'</td>
						<td>'.$val->bay_position.'</td>
						<td>'.$val->record_time.'</td>
						<td>'.$val->iso_code.'</td>
						<td>'.$val->size_type.'</td>
						<td>'.$val->gio_time.'</td>
						<td>'.$val->dl_time.'</td>
						<td>'.$val->stack.'</td>
						<td>'.$val->eta.'</td>
						<td>'.$val->etd.'</td>
						<td>'.$val->yard.'</td>
						<td>'.$val->last_activity.'</td>
						<td>'.$val->doc_info.'</td>
						<td>'.$val->weight_terminal.'</td>
						<td>'.$val->weight_shipper.'</td>
						<td>'.$val->voyage_in.'</td>
					</tr>';
				}
				$html.='
					</tbody>
				</table>
				</div>';
			}
			else
			{
				$html.="<p>".$response['message']."</p>";
			}
		}
		return $html;
	}
}