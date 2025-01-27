<?php
/*
*  GNU General Public License v3.0
*  Contributors: ADD YOUR NAME HERE, Mike P. Sinn
 */

namespace App\Charts\QMHighcharts\Highcharts\MoreChartTypes\ErrorBar;
use App\Charts\QMHighcharts\HighchartConfig;
use App\Charts\QMHighcharts\Options\BaseChart;
use App\Charts\QMHighcharts\Options\BaseSeries;
use App\Charts\QMHighcharts\Options\BaseTitle;
use App\Charts\QMHighcharts\Options\BaseTooltip;
use App\Charts\QMHighcharts\Options\BaseXAxis;
use App\Charts\QMHighcharts\Options\BaseYAxis;
use Ghunti\HighchartsPHP\HighchartJsExpr;
class BaseErrorBar extends HighchartConfig {
	/**
	 * @var BaseChart
	 * @link https://api.highcharts.com/highcharts/chart
	 */
	public $chart;
	/**
	 * @var BaseTitle
	 * @link https://api.highcharts.com/highcharts/title
	 */
	public $title;
	/**
	 * @var BaseXAxis[]
	 * @link https://api.highcharts.com/highcharts/xAxis
	 */
	public $xAxis;
	/**
	 * @var BaseYAxis[]
	 * @link https://api.highcharts.com/highcharts/yAxis
	 */
	public $yAxis;
	/**
	 * @var BaseTooltip
	 * @link https://api.highcharts.com/highcharts/tooltip
	 */
	public $tooltip;
	/**
	 * @var BaseSeries[]
	 * @link https://api.highcharts.com/highcharts/series
	 */
	public $series;
	public function __construct(){
		parent::__construct();
		$this->chart = new BaseChart();
		$this->title = new BaseTitle();
		$this->xAxis = [];
		$this->yAxis = [];
		$this->tooltip = new BaseTooltip();
		$this->series = [];
		$this->includeExtraScripts();
		$this->chart->renderTo = 'container';
		$this->chart->zoomType = 'xy';
		$this->title->text = 'Temperature vs Rainfall';
		$this->xAxis = [
			[
				'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			],
		];
		$this->yAxis = [
			[
				'labels' => [
					'formatter' => new HighchartJsExpr("function() { return this.value + '°C';}"),
					'style' => ['color' => '#89A54E'],
				],
				'title' => [
					'text' => 'Temperature',
					'style' => ['color' => '#89A54E'],
				],
			],
			[
				'title' => [
					'text' => 'Rainfall',
					'style' => ['color' => '#4572A7'],
				],
				'labels' => [
					'formatter' => new HighchartJsExpr("function() { return this.value + ' mm';}"),
					'style' => ['color' => '#4572A7'],
				],
				'opposite' => true,
			],
		];
		$this->tooltip->shared = true;
		$this->series = [
			[
				'name' => 'Rainfall',
				'color' => '#4572A7',
				'type' => 'column',
				'yAxis' => 1,
				'data' => [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
				'tooltip' => [
					'pointFormat' => '<span style="font-weight: bold; color: {series.color}">' .
						'{series.name}</span>: <b>{point.y:.1f} mm</b> ',
				],
			],
			[
				'name' => 'Rainfall error',
				'type' => 'errorbar',
				'yAxis' => 1,
				'data' => [
					[48, 51],
					[68, 73],
					[92, 110],
					[128, 136],
					[140, 150],
					[171, 179],
					[135, 143],
					[142, 149],
					[204, 220],
					[189, 199],
					[95, 110],
					[52, 56],
				],
				'tooltip' => [
					'pointFormat' => '(error range: {point.low}-{point.high} mm)<br/>',
				],
			],
			[
				'name' => 'Temperature',
				'color' => '#89A54E',
				'type' => 'spline',
				'data' => [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
				'tooltip' => [
					'pointFormat' => '<span style="font-weight: bold; color: {series.color}">' .
						'{series.name}</span>: <b>{point.y:.1f}°C</b> ',
				],
			],
			[
				'name' => 'Temperature error',
				'type' => 'errorbar',
				'data' => [
					[6, 8],
					[5.9, 7.6],
					[9.4, 10.4],
					[14.1, 15.9],
					[18.0, 20.1],
					[21.0, 24.0],
					[23.2, 25.3],
					[26.1, 27.8],
					[23.2, 23.9],
					[18.0, 21.1],
					[12.9, 14.0],
					[7.6, 10.0],
				],
				'tooltip' => [
					'pointFormat' => '(error range: {point.low}-{point.high}°C)<br/>',
				],
			],
		];
	}
	public function demo(): string{
		/** @noinspection PhpIncludeInspection */
		require base_path('vendor/ghunti/highcharts-php/demos/highcharts/more_chart_types/error_bar.php');
	}
}
