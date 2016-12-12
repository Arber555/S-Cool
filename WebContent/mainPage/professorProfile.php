<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/professor.css" />
    <link rel="stylesheet" href="font/font awesome/css/font-awesome.min.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="profile" class="col-md-8">
                <div class="row">
                    <div id="imgContainer" class="col-md-5">
                        <img id="profileImage" src="https://pbs.twimg.com/profile_images/447126660161093632/-ZDDkOo_.jpeg">
                    </div>
                    <div id="flex" class="col-md-7">
                        <div>
                            <!--<h1 id="emri">Ragip Topalli</h1>
                            <h4 id="qyteti">Pejë</h4>-->
                            <?php
                                spl_autoload_register(function ($class_name) {
                                    include 'C:\xampp\htdocs\S-Cool\BL/'.$class_name . '.php';
                                });
            
                                $data = Profesori::returnProfesorin("ccc");
                                
                                echo "<h1 id='emri' name='emri'>".$data['Emri']." ".$data['Mbiemri']."</h1>"
                                        ."<h4 id='qyteti' name='qyteti'>".$data['vendBanimi']."</h4>";
                            ?>
                        </div>
                        <div>
                            <div class="info">
                                <ul>
                                    <li><b>Willing to teach</b></li>
                                    <li>Online</li>
                                    <li>Courses</li>
                                    <li>Blended Platform</li>
                                </ul>
                                <dl>
                                    <dt>2</dt>
                                    <dd>Maximum number of courses at one time</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div id="ratings" class="col-md-12">
                        <h3>Student Evaluations</h3>
                        <h4>
                            38 ratings
                            <i class="fa fa-circle"></i>
                            <i class="fa fa-circle"></i>
                            <i class="fa fa-circle"></i>
                            <i class="fa fa-circle "></i>
                        </h4>
                    </div>
                </div>
                <div id="posts" class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Wall</h3>
                        </div>
                        <div class="panel-body">
                          <form>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleInputEmail1" placeholder="What's on your mind?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                            <div class="post-buttons">
                                <div class="btn-group">
                                   <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Text</button>
                                   <button type="button" class="btn btn-default"><i class="fa fa-camera" aria-hidden="true"></i> Image</button>
                                   <button type="button" class="btn btn-default"><i class="fa fa-video-camera" aria-hidden="true"></i> Video</button>
                                </div>
                            </div>
                          </form>
                        </div>
                     </div>
                        <div class="panel panel-default post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a class="post-avatar thumbnail" href="#"><img src="img/user.png">
                                            <div class="text-center">User1</div>
                                        </a>
                                        <div class="likes text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 20 likes</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="bubble">
                                            <div class="pointer">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Maecenas vulputate quam est, a elementum tortor interdum non. 
                                                    Sed ut elementum justo, non facilisis sem. 
                                                    Nam congue purus in arcu congue rhoncus.</p>
                                            </div>
                                            <div class="pointer-border">
                                                
                                            </div>
                                        </div>
                                        <p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> - <a href="#">Follow</a> - <a href="#">Share</a></p>
                                        <div class="comment-form">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Write a comment...">
                                                </div>
                                                <button type="submit" class="btn btn-default">Add</button>
                                              </form>
                                        </div><!-- comment-form end -->
                                        <div class="clearfix"></div>
                                        <div class="comments">
                                            <div class="comment">
                                                <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                <div class="comment-text">
                                                    <p>Sed convallis est in ante sodales</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            
                                            <div class="comment">
                                                <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                <div class="comment-text">
                                                    <p>Sed convallis est in ante sodales</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="panel panel-default post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a class="post-avatar thumbnail" href="#"><img src="img/user.png">
                                            <div class="text-center">User2</div>
                                        </a>
                                        <div class="likes text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 50 likes</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="bubble">
                                            <div class="pointer">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Maecenas vulputate quam est, a elementum tortor interdum non. 
                                                    Sed ut elementum justo, non</p>
                                            </div>
                                            <div class="pointer-border">
                                                
                                            </div>
                                        </div>
                                        <p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> - <a href="#">Follow</a> - <a href="#">Share</a></p>
                                        <div class="comment-form">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Write a comment...">
                                                </div>
                                                <button type="submit" class="btn btn-default">Add</button>
                                              </form>
                                        </div><!-- comment-form end -->
                                        <div class="clearfix"></div>
                                        <div class="comments">
                                            <div class="comment">
                                                <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                <div class="comment-text">
                                                    <p>Sed convallis est in ante sodales</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            
                                            <div class="comment">
                                                <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                <div class="comment-text">
                                                    <p>Sed convallis est in ante sodales</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="panel panel-default post">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <a class="post-avatar thumbnail" href="#"><img src="img/user.png">
                                            <div class="text-center">User3</div>
                                        </a>
                                        <div class="likes text-center"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 30 likes</div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="bubble">
                                            <div class="pointer">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Maecenas vulputate quam est, 
                                                    Nam congue purus in arcu congue rhoncus.</p>
                                            </div>
                                            <div class="pointer-border">
                                                
                                            </div>
                                        </div>
                                        <p class="post-actions"><a href="#">Comment</a> - <a href="#">Like</a> - <a href="#">Follow</a> - <a href="#">Share</a></p>
                                        <div class="comment-form">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                  <input type="text" class="form-control" id="exampleInputName2" placeholder="Write a comment...">
                                                </div>
                                                <button type="submit" class="btn btn-default">Add</button>
                                              </form>
                                        </div><!-- comment-form end -->
                                        <div class="clearfix"></div>
                                        <div class="comments">
                                            <div class="comment">
                                                <a class="comment-avatar pull-left" href="#"><img src="img/user.png"></a>
                                                <div class="comment-text">
                                                    <p>Sed convallis est in ante sodales</p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            
            <div id="sidebar" class="col-md-4">
                <button class="btn btn-primary">Test button 1</button>
                <button class="btn btn-primary">Test button 2</button>
                <ul id="others">
                    <li>HR Blog<i class="pull-right fa fa-chevron-right"></i></li>
                    <li>Published Articles<i class="pull-right fa fa-chevron-right"></i></li>
                    <li>Rate my professor profile<i class="pull-right fa fa-chevron-right"></i></li>
                    <li>Articles of interest<i class="pull-right fa fa-chevron-right"></i></li>
                </ul>
                <ul id="social">
                    <li id="youtube"><a><i class="fa fa-youtube-play fa-lg"></i></a></li>
                    <li id="facebook"><a><i class="fa fa-facebook fa-lg"></i></a></li>
                    <li id="linkedin"><a><i class="fa fa-linkedin fa-lg"></i></a></li>
                    <li id="twitter"><a><i class="fa fa-twitter fa-lg"></i></a></li>
                    <li id="flickr"><a><i class="fa fa-flickr fa-lg"></i></a><</li>
                </ul>
                <ul id="others">
                    <li>Curriculum Vitae<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Resume<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Transcripts<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Letters of Recommendation<i class="pull-right fa fa-chevron-circle-down"></i></li>
                    <li>Pedagogical Statement<i class="pull-right fa fa-chevron-circle-down"></i></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-8">

                </div>
                <div class="col-md-8">

                </div>
            </div>
            
            
        </div>
    </div>
</body>
</html>
