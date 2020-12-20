<template>
<div>
    <div class="row  img-background">
        <div class="col-md-12 text-center pl-0 pr-0">
            <div class="connten_a1">
                <div class="row justify-content-sm-center">
                    <div class="col-md-6">
                        <h1 class="mt-5 pt-5"></h1>
                        <div id="clock-box">
                            <div id="clock" class="text-danger">
                                <date>{{time}} DAYS</date>
                                <time style="font: normal 25px Roboto,arial,sans-serif;font-family: 'Dancing Script', cursive!important;">
                                    {{currTime.getHours()}}:{{currTime.getMinutes()}}:{{currTime.getSeconds()}}
                                </time>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="info">
                    <div class="one">
                            <img src="img/love.jpg" class="avt">
                            <p>Nguyễn Minh Hiếu</p>
                    </div>
                    
                    <div class="two">
                            <img src="img/loveyou.jpg" class="avt">
                            <p>Nguyễn Thúy Hằng</p>
                    </div>
                </div>
                    
                <div id="heart">
                    I love you
                </div>
                <div id="music" class="mb-5 pb-5">
                    <vue-audio file="myLocalFile"></vue-audio>
                    <audio loop autoplay src="mp3/a2.mp3" controls="controls"></audio>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-sm-center carousel_hover mb-5">
        <div class="col-md-12 text-center mt-5">
            <h1 class="mb-5" style="font: normal 25px Roboto,arial,sans-serif;font-family: 'Dancing Script', cursive!important;"><strong>I've been running from the pain</strong></h1>
        </div>
        <div class="col-md-6 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner slider">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/p5.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/p4.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/p3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/8.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/p1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/1.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/4.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="gallery js-flickity"
            data-flickity-options='{ "wrapAround": true }'>
                <div class="gallery-cell"></div>
                <div class="gallery-cell"></div>
                <div class="gallery-cell"></div>
                <div class="gallery-cell"></div>
                <div class="gallery-cell"></div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-sm-center">
        <div class="col-md-12 text-center mt-5 text-danger" style="font: normal 15px Roboto,arial,sans-serif;font-family: 'Dancing Script', cursive!important;">
            Nguyễn Thúy Hằng là đồ đáng ghét, ghét nhất nhất nhât lun đó <3
        </div>
    </div>
    <footer class="page-footer font-small mdb-color darken-3 pt-4 bg-info">

        
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9 mb-4">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/7hN2EhL7Jg0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center text-danger py-3 off-me" >Cô Bé Của Anh:
            <a href="https://www.facebook.com/minhhieu97.hust/">Hiu</a>💕
            <a href="https://www.facebook.com/Hang.ntt2001/">Han</a>
        </div>
</footer>
</div>
</template>

<script>
export default {
    data() {
        return {
            time: 0,
            message: 'Current Time:',
            currTime: new Date(),
        }
    },
   
    created() {
        this.startName();
        setInterval(()=>{
				this.currTime = new Date();
			},1000)
    },
    
    computed: {
        sec() {
            return this.currTime.getSeconds()*6;
        },
        min() {
            return this.currTime.getMinutes()*6 + this.currTime.getSeconds()/10 ;
        },
        hour() {
            return this. currTime.getHours()*30 + this.currTime.getMinutes()/2;
        }
    },

    mounted() {
    },
    methods: {
        startName() {
            var time1 = new Date();
            console.log(time1);

            var time2 = new Date('2019-07-21');
            console.log(time2);

            var t1 = time1.getTime();
            var t2 = time2.getTime();

            this.time = parseInt((t1-t2)/(24*3600*1000));
        },
        change_bg() {
            console.log(123);
        }
        
    }
}
</script>