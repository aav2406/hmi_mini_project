<style>
    .team-member,
.team-member .team-img {
	position: relative;
}

.team-member {
	overflow: hidden;
}

.team-member,
.team-member .team-img {
	position: relative;
}

.team-hover {
	position: absolute;
	top: 10px;
	left: 10px;
	bottom: 10px;
	right: 10px;
	margin: 0;
	border: 12px solid rgba(0, 0, 0, 0.1);
	background-color: rgba(0, 0, 0, 0.7);
	opacity: 0;
	-webkit-transition: all 0.3s;
	transition: all 0.3s;
}

.team-member:hover .team-hover .desk {
	top: 30%;
}

.team-member:hover .team-hover,
.team-member:hover .team-hover .desk,
.team-member:hover .team-hover .s-link {
	opacity: 1;
}

.team-hover .desk {
	position: absolute;
	top: 0%;
	width: 100%;
	opacity: 0;
	-webkit-transform: translateY(-55%);
	-ms-transform: translateY(-55%);
	transform: translateY(-55%);
	-webkit-transition: all 0.3s 0.2s;
	transition: all 0.3s 0.2s;
	padding: 0 10px;
}

.desk,
.desk h4,
.team-hover .s-link a {
	text-align: center;
	color: #eee;
     text-transform: capitalize;
}
.desk p {
    font-size: 14px;
    letter-spacing: .5px;
    color: #aaa;
    margin-top: 10px;
}

.team-member:hover .team-hover .s-link {
	bottom: 10%;
}

.team-member:hover .team-hover,
.team-member:hover .team-hover .desk,
.team-member:hover .team-hover .s-link {
	opacity: 1;
}

.team-hover .s-link {
	position: absolute;
	bottom: 0;
	width: 100%;
	opacity: 0;
	text-align: center;
	-webkit-transform: translateY(45%);
	-ms-transform: translateY(45%);
	transform: translateY(45%);
	-webkit-transition: all 0.3s 0.2s;
	transition: all 0.3s 0.2s;
	font-size: 35px;
}

.team-member .s-link a {
    margin: 0 2px;
    color: #fff;
    font-size: 16px;
    background: rgba(0, 0, 0, 0.3);
    width: 35px;
    height: 35px;
    line-height: 35px;
    display: inline-block;
}

.team-title {
	position: static;
	padding: 20px 0 0;
	display: inline-block;
	letter-spacing: 2px;
	width: 100%;
}

.team-title h5 {
	margin-bottom: 0px;
	display: block;
    font-size: 22px;
    color: #353c4e;
}

.team-title span {
	font-size: 12px;
	text-transform: uppercase;
	color: #a5a5a5;
	letter-spacing: 1px;
}
h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0;
    letter-spacing: 1px;
	font-family: 'Dosis', sans-serif;
}
@media(max-width:384px) {
    .team_grids{
		width: 85%;
	}
}

@media(max-width:415px) {
    .team-title h5 {
		font-size: 18px;
	}
}

@media(max-width:480px) {
    .team_grids{
		width: 75%;
	}
}

@media(max-width:568px) {
    .team_grids{
		width: 63%;
		margin: auto;
	}
}


</style>
@extends('layouts.app')
@section('content')
<section class="trainers pt-5">
	<div class="container py-md-3">
		<h3 class="heading text-center mb-5">Our Developers </h3>
		 <div class="row team_grids mt-5">
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="team-member">
					<div class="team-img">
						<img src="images/t1.jpg" alt="team member" class="img-fluid">
					</div>
					<div class="team-hover">
						<div class="desk">
							<h4>Developer</h4>
							<p>D12A VESIT</p>
						</div>
						<div class="s-link">
							<a href="#">
								<span class="fab fa-facebook"></span>
							</a>
							<a href="#">
								<span class="fab fa-twitter"></span>
							</a>
							<a href="#">
								<span class="fab fa-google-plus"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="team-title">
					<h5>Mohit Thorat</h5>
					<span>Web Developer</span>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mb-5">
				<div class="team-member">
					<div class="team-img">
						<img src="images/IMG_6390.JPG" alt="team member" class="img-fluid">
					</div>
					<div class="team-hover">
						<div class="desk">
							<h4>Developer</h4>
							<p>D12A VESIT</p>
						</div>
						<div class="s-link">
							<a href="#">
								<span class="fab fa-facebook-f"></span>
							</a>
							<a href="#">
								<span class="fab fa-twitter"></span>
							</a>
							<a href="#">
								<span class="fab fa-google-plus"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="team-title">
					<h5>Anish Vaidya</h5>
					<span>Web Developer</span>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mx-auto mb-5">
				<div class="team-member">
					<div class="team-img">
						<img src="images/t3.jpg" alt="team member" class="img-fluid">
					</div>
					<div class="team-hover">
						<div class="desk">
							<h4>Developer</h4>
							<p>D12A VESIT</p>
						</div>
						<div class="s-link">
							<a href="#">
								<span class="fab fa-facebook"></span>
							</a>
							<a href="#">
								<span class="fab fa-twitter"></span>
							</a>
							<a href="#">
								<span class="fab fa-google-plus"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="team-title">
					<h5>Chetas Shinde</h5>
					<span>Web Developer</span>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 mx-auto mb-5">
				<div class="team-member">
					<div class="team-img">
						<img src="images/t4.jpg" alt="team member" class="img-fluid">
					</div>
					<div class="team-hover">
						<div class="desk">
							<h4>Developer</h4>
							<p>D12A VESIT</p>
						</div>
						<div class="s-link">
							<a href="#">
								<span class="fab fa-facebook"></span>
							</a>
							<a href="#">
								<span class="fab fa-twitter"></span>
							</a>
							<a href="#">
								<span class="fab fa-google-plus"></span>
							</a>
						</div>
					</div>
				</div>
				<div class="team-title">
					<h5>Vinit P Motwani</h5>
					<span>Web Developer</span>
				</div>
			</div>
		</div>
    </div>
    
    <div class="container py-md-3">
            <h3 class="heading text-center mb-5">Our Mentors</h3>
             <div class="row team_grids mt-5">
                <div class="col-lg-3 col-sm-6 mx-auto mb-5">
                    <div class="team-member">
                        <div class="team-img">
                            <img src="images/t1.jpg" alt="team member" class="img-fluid">
                        </div>
                        <div class="team-hover">
                            <div class="desk">
                                <h4>Mentor</h4>
                                <p>Assistant Professor</p>
                            </div>
                            <div class="s-link">
                                <a href="#">
                                    <span class="fab fa-facebook"></span>
                                </a>
                                <a href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a href="#">
                                    <span class="fab fa-google-plus"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-title">
                        <h5>Pooja Nagdev</h5>
                        <span>Web Developer</span>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6 mx-auto mb-5">
                    <div class="team-member">
                        <div class="team-img">
                            <img src="images/t4.jpg" alt="team member" class="img-fluid">
                        </div>
                        <div class="team-hover">
                            <div class="desk">
                                <h4>Co - Mentor</h4>
                                <p>Assistant Professor</p>
                            </div>
                            <div class="s-link">
                                <a href="#">
                                    <span class="fab fa-facebook"></span>
                                </a>
                                <a href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a href="#">
                                    <span class="fab fa-google-plus"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="team-title">
                        <h5>Abha Tiwari</h5>
                        <span>Web Developer</span>
                    </div>
				</div>
            </div>
        </div>


</section>
@endsection