@extends('public.layouts.common.basic')

@section('title')
	<title>NSTU Admission test result 2015</title>
@stop

@section('menu_items')
	<li><a href="/">View result</a></li>
	<li><a href="/downloads">Result download</a></li>	
	<li class="active"><a href="/instructions">Instructions</a></li>
@stop

@section('contents')
	<!-- <div class="main">
		<div class="container">	
        	<div class="row" style="margin-top: 10px">
				<div clas="col-md-12" style="padding: 0px 5px">
					<div class="alert alert-warning">
						<h4>২০১৪-১৫ শিক্ষাবর্ষের প্রথম বর্ষ স্নাতক (সম্মান) শ্রেনীর ভর্তি প্রক্রিয়া অনিবার্য কারণে স্থগিত</h4>
						<p> নোয়াখালী বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়ের ২০১৪-১৫ শিক্ষাবর্ষে প্রথম বর্ষ স্নাতক (সম্মান) শ্রেণীর ১১-১৫ জানুয়ারী ২০১৫ অনুষ্ঠিতব্য ভর্তি কার্যক্রম অনিবার্য কারণে স্থগিত করা হয়েছে। পরিবর্তিত সময়সূচি পরবর্তীতে জানানো হবে।</p>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 10px;">
				<div class="col-md-12 " style="padding:0px 5px;">
					<div class="panel panel-primary">
						<div class="panel-heading" style="padding: 5px 15px;">
							<h1  style="display:inline; line-height: 34px;" class="panel-title">ভর্তি নির্দেশিকা</h1>
							<div class="btn-group" style="display:inline; float: right;">							
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
									<i class="download-icon glyphicon glyphicon-download"></i>&nbsp;Download
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a target="blank" href="https://www.dropbox.com/s/bjypfiq7wx6vwzk/Admission%20Instructions.pdf?dl=1">PDF</a></li>
									<li><a target="blank" href="https://www.dropbox.com/s/05oe5x1zv9yrl45/Admission%20Instructions.docx?dl=1">Word 2007</a></li>
									<li><a target="blank" href="https://www.dropbox.com/s/ez5prcp7vtpat17/Admission%20Instructions.doc?dl=1">Word 2003</a></li>
									<li class="divider"></li>
									<li><a target="blank" href="https://www.dropbox.com/s/5tdl4civw533ls1/Admission%20Instructions%20English.pdf?dl=1">English version</a></li>
								</ul>
							</div>							
						</div>
						<div class="panel-body">
							<p>বিষয় নির্বাচন ও ভর্তি :<br />
							<s>১১ জানুয়ারী ২০১৫ সকাল ৯ টা</s> থেকে গ্রুপ-A&nbsp; মেধাতালিকা ১-৩০০ পর্যন্ত ।<br />
							<s>১২ জানুয়ারী ২০১৫ সকাল ৯ টা</s> থেকে গ্রুপ-A&nbsp; মেধাতালিকা ৩০১-৬০০ পর্যন্ত ও মুক্তিযোদ্ধা কোটার&nbsp; মেধাতালিকার&nbsp; ২০ জন এবং উপজাতি&nbsp; কোটার মেধাতালিকার প্রথম ১০ জন।<br />
							<s>১৩ জানুয়ারী ২০১৫ সকাল ৯টা</s> থেকে গ্রুপ-B মেধাতালিকা ১-৩০০ পর্যন্ত<br />
							<s>১৪ জানুয়ারী ২০১৫ সকাল ৯টা</s> থেকে গ্রুপ-B মেধাতালিকা ৩০১-৬০০ পর্যন্ত ও মুক্তিযোদ্ধা কোটার মেধাতালিকার প্রথম ২০ জন এবং উপজাতি&nbsp; কোটার মেধাতালিকার প্রথম ১০ জন।<br />
							<s>১৫ জানুয়ারী ২০১৫ সকাল ৯টা</s> থেকে গ্রুপ-C মেধাতালিকা ১-১০০ পর্যন্ত ও মুক্তিযোদ্ধা কোটার মেধাতালিকার প্রথম ০৪ জন এবং উপজাতি কোটার মেধাতালিকার প্রথম ০২ জন।<br />
							<s>১৫ জানুয়ারী ২০১৫ দুপুর ১২টা</s> থেকে গ্রুপ-D মেধাতালিকা ১-১০০ (বিজ্ঞান), ১-৮০ (বাণিজ্য) ও ১-৬০ (কলা) পর্যন্ত ও মুক্তিযোদ্ধা কোটার মেধাতালিকার প্রথম ৩ জন (বিজ্ঞান) এবং উপজাতি কোটার মেধাতালিকার প্রথম ২ জন (বাণিজ্য)।</p>
							 
							<p>ভর্তির অনুমতি প্রাপ্ত প্রার্থীদেরকে ১১-১৫ জানুয়ারী ২০১৫ এর মধ্যে অবশ্যই ভর্তি হতে হবে। উল্লেখ্য A গ্রুপে ৩০০জন, B গ্রুপে ৩৬০জন, C গ্রুপে ৬০ জন এবং D গ্রুপে ১৪০জন ছাত্রছাত্রী মেধাক্রম অনুযায়ী ভর্তির সুযোগ পাবে।</p>
							 
							<p>আসন খালি থাকা সাপেক্ষে পরবর্তী মেধাক্রমানুসারে ভর্তি করা হবে।</p>
							 
							<p><br />
							ভর্তির প্রয়োজনীয় কাগজপত্র :<br />
							১. এসএসসি ও এইচএসসি&rsquo;র মূল মার্কশিট এবং প্রত্যেকটির একটি করে সত্যায়িত কপি অবশ্যই সঙ্গে আনতে হবে, ২. পর্যবেক্ষক কর্তৃক স্বাক্ষরিত ছবিসহ রেজিস্ট্রেশন কার্ড (এইচএসসি বা সমমান), ৩. পাঁচ কপি পাসপোর্ট সাইজের রঙিন ছবি, ৪. নাগরিকত্ব সার্টিফিকেট/জন্ম নিবন্ধন/পাসপোর্ট এর সত্যায়িত কপি, ৫. মুক্তিযোদ্ধা কোটায় ভর্তিচ্ছু প্রার্থীদের পিতা-মাতার অনুকুলে সরকার কর্তৃক ইস্যুকৃত মুক্তিযোদ্ধা সার্টিফিকেট এবং প্রয়োজনে দাদা-দাদী, নানা-নানীর সম্পর্কের সার্টিফিকেটের মূল কপি এবং সত্যায়িত কপি, ৬. উপজাতি প্রার্থীদের ক্ষেত্রে উপজাতি ভিত্তিক প্রত্যয়ন পত্রের মূল কপি ও সত্যায়িত কপি এবং ৭. প্রথম টার্মের ক্রেডিট আওয়ার ফিসহ অন্যান্য ফি-চার্জ বাবদ A গ্রুপের জন্য আনুমানিক ১৯,০০০.০০ (উনিশ হাজার) টাকা, B গ্রুপের জন্য আনুমানিক ১৯,০০০.০০ (উনিশ হাজার) টাকা, C গ্রুপের জন্য আনুমানিক ১৭,০০০.০০ (সতের হাজার) টাকা এবং D গ্রুপের জন্য আনুমানিক ১৭,৫০০.০০ (সতের হাজার পাঁচশত) টাকা ভর্তি হওয়ার জন্য সঙ্গে আনতে হবে।</p>
							 
							<p>উপরোল্লেখিত কাগজপত্র ব্যতিত কোন ছাত্রছাত্রীকে ভর্তির অনুমতি দেয়া হবে না।</p>
							 
							<p>বি.দ্র: ভর্তিকৃত ছাত্রছাত্রীদের আবাসনের কোন ব্যবস্থা নেই।</p>
							 
							<p>&nbsp;&nbsp; &nbsp;প্রফেসর মোঃ মমিনুল হক<br />
							&nbsp;&nbsp; &nbsp;সচিব, ভর্তি কমিটি (২০১৪-১৫)<br />
							&nbsp;&nbsp; &nbsp;ও<br />
							&nbsp;&nbsp; &nbsp;রেজিস্ট্রার<br />
							&nbsp;&nbsp; &nbsp;নোয়াখালী বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়।</p> 
						</div>
					</div>
				</div>
			</div>

		</div>
	</div> -->
@stop