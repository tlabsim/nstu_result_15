<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('units', function($table)
		{
			$table->increments('id');	
			$table->string('unit', 2);
			$table->integer('merit_seats');
			$table->integer('ff_seats');
			$table->integer('tribal_seats');
			$table->boolean('is_result_published');	

			$table->timestamps();					
		});
		
		Schema::create('departments', function($table)
		{
			$table->increments('dept_id');	
			$table->string('unit', 2);
			$table->integer('seats');
			$table->string('description')->nullable();

			$table->timestamps();					
		});

		Schema::create('examinees', function($table)
		{							
			$table->string('exam_roll')->primary();
			$table->string('unit', 2);
			$table->string('pin', 20)->nullable();
			$table->string('name', 100);
			$table->string('father_name', 100)->nullable();
			$table->string('mother_name', 100)->nullable();
			$table->enum('gender', array('MALE', 'FEMALE'))->nullable();
			$table->date('dob')->nullable();
			$table->string('quota')->nullable();
			$table->string('hsc_board', 20)->nullable();
			$table->string('hsc_group', 20)->nullable();
			$table->string('hsc_roll', 20)->nullable();
			$table->string('hsc_reg_no', 20)->nullable();
			$table->integer('hsc_year')->nullable();
			$table->float('hsc_gpa')->nullable();
			$table->float('hsc_gpa_ex_fourth')->nullable();
			$table->string('ssc_board', 20)->nullable();
			$table->string('ssc_group', 20)->nullable();
			$table->string('ssc_roll', 20)->nullable();
			$table->string('ssc_reg_no', 20)->nullable();
			$table->integer('ssc_year')->nullable();
			$table->float('ssc_gpa')->nullable();
			$table->float('ssc_gpa_ex_fourth')->nullable();	

			$table->timestamps();		
		});

		Schema::create('results', function($table)
		{
			$table->increments('id');	
			$table->string('exam_roll');
			$table->float('score');
			$table->float('total_score');
			$table->integer('merit_position');
			$table->string('list', 20);		
			$table->foreign('exam_roll')->references('exam_roll')->on('examinees')->onDelete('cascade');;

			$table->timestamps();				
		});

		Schema::create('results_details', function($table)
		{
			$table->increments('id');
			$table->string('exam_roll');			
			$table->float('physics')->nullable();
			$table->float('chemistry')->nullable();
			$table->float('biology')->nullable();
			$table->float('math')->nullable();
			$table->float('ban_eng')->nullable();
			$table->float('bangla')->nullable();
			$table->float('english')->nullable();
			$table->float('analytical_ability')->nullable();
			$table->float('general_knowledge')->nullable();	
			$table->foreign('exam_roll')->references('exam_roll')->on('examinees')->onDelete('cascade');;		

			$table->timestamps();					
		});
		
		Schema::create('download_links', function($table)
		{
			$table->increments('link_id');	
			$table->string('unit', 2);
			$table->string('title');
			$table->string('subtitle')->nullable();
			$table->string('link');
			$table->boolean('is_dead')->default(false);
			$table->integer('download_count')->default(0);
			
			$table->timestamps();					
		});

		Schema::create('settings', function($table)
		{
			$table->increments('id');	
			$table->string('parameter');
			$table->string('value');

			$table->timestamps();		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('units');
		Schema::drop('departments');
		Schema::drop('examinees');
		Schema::drop('results');
		Schema::drop('results_details');
		Schema::drop('download_links');
		Schema::drop('settings');
	}

}
