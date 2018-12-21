
<style>
.commentbox{ width:100%;}
.iconDiv{ width:60px; height:60px}
.iconSize{ width:100%; height:100%}
.line{ height:1px; width:100%; background-color:#999}
.right-float{ float:right}
.block-color{ background-color:#333}
.block-in{ margin:15px}
</style>


<body>
<?php
include"head.php";

$videoID=$_GET["new"];
echo $videoID;
include "pdo.php";
$_SESSION["videoID"]=$videoID;

try{ 
	$query = "select * from video where videoID='{$videoID}'";
	$result = $pdo->prepare($query);
	$result->execute();
	$res=$result->fetch(PDO::FETCH_ASSOC);	
	
	$videoAdd = $res["videoAdd"];			
			}catch(Exception $e){
			echo $e->getMessage()."<br>";
			}
	

?>
<div class="jumbotron">
<div class="block-in"><!--控制边距-->
<!--********************************输出标题*************************-->
		<div class="row">
            <div class="col-md-8 text-left">
            	<h3><?php echo $res["videoTitle"]; ?></h3>
            </div>
            <div class="col-md-4"></div>
        </div>

<!--********************************视频部分*************************-->
	<div class="row">
        <div class="col-md-8 text-center">
			<video width="100%" height="450px" controls class="block-color">
  				<source src="<?php echo $res["videoAdd"]; ?>" type="video/mp4">
				您的浏览器不支持Video标签。
			</video>
		</div>
        <div class="col-md-4"></div>
	</div>
    
    <!--********************************收藏部分*************************-->
	<div class="row">
        <div class="col-md-8 text-right">
			
		</div>
        <div class="col-md-4"></div>
	</div>
    
<!--*********************************下面评论***************************-->
        <div class="row">
            <div class="col-md-8 text-left">
            <?php
			//获取关注记录
			if(empty($_SESSION["userMail"])){
			echo "<a href='login.php' class='right-float'>收藏请先登录</a>";	
			}else{
			$followSql="select * from follow where followUser='{$_SESSION['userMail']}' and followVideo='$videoID'";
			$followAbout = $pdo->prepare($followSql);
			$followAbout->execute();
			$followData=$followAbout->fetch(PDO::FETCH_ASSOC);
			if(empty($followData))
			{
				echo "<a href='follow_next.php?videoID={$videoID}' class='right-float'>收藏视频</a>";
				}else{
					echo "<a href='unfollow.php?followID={$followData['followID']}' class='right-float'>取消收藏</a>";
					}
				}//判断登录的结束括号
			?>
            	<h3>评论</h3>
                
            </div>
            <div class="col-md-4"></div>            
        </div>
<!--************************************************************-->
		<form class="form-horizontal" action="comment_next.php" method="post">
		<div class="row">
            <div class="col-md-8">
            <textarea class="commentbox" rows="5" name="commentText" required></textarea>	
            </div>
            <div class="col-md-4"></div>
        </div>
        
        <div class="row">
            <div class="col-md-8 text-right">
            	<br>
            	<button type="submit" class="btn btn-default">发表</button>
            </div>
            <div class="col-md-4"></div>
        </div>
        </form>
        <br />
        <?php //***********下面是输出评论内容遍历**************************************************************?>
        
        <div class="row">
        <!--这行以后是输出块***********************************************-->
            <div class="col-md-8">
            
            <div class="text-center" style="background-color:#6CF; width:150px; padding:5px"><label class="control-label">全部评论</label></div>
            <div class="line"></div>
            <br/><!--这两行是第一条LINE************************************-->
            
            		<?php
						try{ 
							//根据select 评论 = videoID获取这条视频的评论
							$page_num = 10;//单页评论条数
							if(isset($_GET["page"])){$page=$_GET["page"];}else{$page = 1;}
							
							$pageLeft=($page-1)*$page_num;
							
							$query2 = "select * from comment where ownedComment = '{$videoID}' limit $pageLeft,$page_num";
							$commentSql = $pdo->prepare($query2);
							$commentSql->execute();
										
					//$res2是查询这个视频全部评论的结果
					while($res2=$commentSql->fetch(PDO::FETCH_ASSOC))
						{	
										//这下面是获取评论者信息
										try{ 
										$query3 = "select * from users where mail='{$res2['commentUser']}'";
										$resultUser = $pdo->prepare($query3);
										$resultUser->execute();
										$resUser=$resultUser->fetch(PDO::FETCH_ASSOC);
												//在这下面获取评论用户的头像地址，给$userIconAdd
												$userIconAdd=$resUser["icon"];
									}catch(Exception $e){
									echo $e->getMessage()."<br>";
									}
										//到这里就获取了用户的icon，变量是$userIconAdd
										//************************************************************************************
										
							?>
                            <!--***************************************下面是单列输出的一块评论*********************************-->

                            <div class="row">
                            	<div class="col-md-2 text-center">
                                    
                                    	<!--***头像输出***-->
                                        <img src="<?php echo $userIconAdd; ?>" class="img-rounded img-circle iconDiv">
                                    
                                    
                                    <div class="text-center">
                                    <label class="control-label"><?php echo $resUser["userName"] ?></label>
									</div>
                                <br /><!--这是头像div的回车***********************************************************-->
                                <br />
                                </div>
                                <div class="col-md-10">
                                	<div class=" text-right">
                                    	<label class="control-label"><?php echo $res2["commentTime"]; ?></label>
                                    </div>
                                	<p><?php echo $res2["commentContent"]; ?></p>
                                </div>
                            </div>
                            
                            	<div class="line"></div>
                                <br />
                                
							<?php
							
						}//大的for循环结束，开始翻页的编写**************************************
							?>
                            <div class="text-center">
                            <?php
							//页数计数和当前页数
								$pageNumber=0;
                                $sqlPage = "select * from comment where ownedComment = '{$videoID}'";
							$howPage = $pdo->prepare($sqlPage);
							$howPage->execute();
							
							while($pageInt=$howPage->fetch(PDO::FETCH_ASSOC))
							{
								$pageNumber=$pageNumber+1;//辛酸的累加计数
								}
								
								$pageSum=ceil($pageNumber/$page_num);//总页数
								echo "第".$page."页|共".$pageSum."页";

							?>
                            
                            <br /><br />
                            	<a href="videoplay.php?new=<?php echo $videoID; ?>&page=<?php if($page>1){echo $page-1;}else{echo 1;} ?>">上一页</a>

								
								<a href="videoplay.php?new=<?php echo $videoID; ?>&page=<?php if($pageNumber/$page_num > $page){echo $page+1;}else{echo $page;} ?>">下一页</a>
							</div>
							<?php
							}catch(Exception $e){
							echo $e->getMessage()."<br>";
							}
			?>
            </div>
            <div class="col-md-4"></div>
            
        </div>
        </div><!--边距-->
	</div>
 
</body>
</html>