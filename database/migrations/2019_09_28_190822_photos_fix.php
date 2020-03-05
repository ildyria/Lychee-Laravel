<?php

/** @noinspection PhpUndefinedClassInspection */
use App\Photo;
use App\Logs;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhotosFix extends Migration
{
	private function fix_thumbs()
	{
		// from fix_thumb2x_default
		Photo::where('thumbUrl', '=', '')
			->where('thumb2x', '=', '1')
			->update([
				'thumb2x' => 0,
			]);
		Schema::table('photos', function (Blueprint $table) {
			$table->boolean('thumb2x')->default(false)->change();
		});
	}

	private function image_direction()
	{
		// migration from imageDirection
		if (!Schema::hasColumn('photos', 'imgDirection')) {
			Schema::table('photos', function (Blueprint $table) {
				$table->decimal('imgDirection', 10, 4)->default(null)
					->after('altitude')->nullable();
			});
		}
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('photos')) {
			Logs::warning(__FUNCTION__,__LINE__,"no table photos found.");

			return;
		}

		$this->fix_thumbs();
		$this->image_direction();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Logs::warning(__FUNCTION__,__LINE__,"There is no going back! HUE HUE HUE");
	}
}
