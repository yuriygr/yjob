<div class="main left">
	<h1>{{ resume.name }}</h1>
	<div class="card-box">
		<div class="card-content">
			<p><i class="fa fa-user"></i> {{ resume.getUser().getFullname() }}, {{ resume.getUser().getGender() }}, {{ resume.getUser().getAge() }}</p>
			<p><i class="fa fa-city"></i> {{ resume.getUser().location }}</p>	
			<p><i class="fa fa-rub"></i> {{ resume.getPrice() }}</p>
			<p><i class="fa fa-calendar"></i> {{ resume.getResumeActivity().name }}</p>
			<p><i class="fa fa-calendar"></i> {{ resume.getResumeSchedule().name }}</p>		
			<p><i class="fa fa-clock-o"></i> {{ resume.getDate() }}</p>
			<hr>
			<p>E-mail {{ resume.getUser().email }}</p>
			<p>Телефон {{ resume.getUser().email }}</p>
		</div>
	</div>
	{{ partial("common/share") }}
	<div class="card-box">
		<div class="card-content">
			{{ resume.content }}
		</div>
	</div>
</div>

<div class="clearfix"></div>