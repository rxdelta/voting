<html>
    <head>
        <script src="../html_headers/jquery-1.9.1.min.js"></script>
        <script src="../html_headers/jquery-ui.min.js"></script>
        <script type="text/javascript">
    var countTo = function (parentEl,name,pic,rank,number){
        this.number=0;
        this.finalNumber=number||0;
        this.timeout=null;
        this.delay=200;
        this.rank=rank;
        this.id=rank;
        this.status=false;
        this.parentEl=parentEl;
        this.name=name;
        this.pic=pic;
        
        this.construct=function(){
            var parentEl=me.parentEl;
            var name=me.name;
            var pic=me.pic;
            var rank=me.rank;
            var top=10+((rank-1)*70);
            var el='<div id="rankItem'+rank+'" class="rankingItem" rank="'+rank+'" style="top:'+top+'"><img src="'+pic+'" alt="'+name+'"/><span>'+name+'</span><span class="result">0</sapn></div>';
            var id='#rankItem'+rank;
            $(parentEl).append(el);
            me.el=$(id);
            me.upEl=(me.el.siblings('div[rank='+(rank-1)+']').length>0)?me.el.siblings('div[rank='+(rank-1)+']'):null;
            me.add();
            return me;
        }
        
        this.changeRank=function(){
            setTimeout(me.moveUp,50);
            setTimeout(me.moveDown,50);
        }
        
        this.moveUp=function(){
            me.el.css('z-index','100');
            var rank=me.rank-1;
            me.el.attr('rank',rank);
            me.rank=rank;
            var height=10+((rank-1)*70);
            me.el.animate({
                top:height+'px'
                }, 500 );
            me.el.css('z-index','1');
        }
        
        this.moveDown=function(){
            me.el.css('z-index','1');
            var rank=me.rank+1;
            me.upEl.attr('rank',rank);
            var height=10+((rank-1)*70);
            me.upEl.animate({
                top:height+'px'
                }, 500 );
            me.upEl=(me.el.siblings('div[rank='+(me.rank-1)+']').length>0)?me.el.siblings('div[rank='+(me.rank-1)+']'):null;
        }
        
        this.add=function(){
            clearTimeout(me.timeout);
            me.timeout=null;
            var num=parseInt(me.el.children('span.result').html());
            num++;
            if(num<=me.finalNumber){
                me.el.children('span.result').html(num);
                me.number=num;
                me.compare();

                if(!me.timeout){
                    me.timeout=setTimeout(manager.workinItem.add,me.delay);
                }
            }else{
                clearTimeout(me.timeout);
                me.timeout=null;
                me.status=true;
            }
        }
        
        this.compare=function(){
            if(me.upEl){
                var upRowNum=parseInt(me.upEl.children('span.result').html());
                if (me.number>upRowNum){
                    me.changeRank();
                }
            }
        }
        var me=this;
    }

var manager={
    list:[],
    addedListNum:0,
    workinItem:null,
    timeout:null,
    parentEl:null,
    
    add:function(name,pic,number){
        var length=manager.addedListNum;
        var rank=length+1;
        manager.workinItem=new countTo(manager.parentEl,name,pic,rank,number);
        manager.workinItem.construct();
        manager.addedListNum++;
    },
    
    check:function(){
        var rank=manager.addedListNum;
        if(manager.workinItem.status && manager.list[rank]){
            var name=manager.list[rank][0];
            var pic=manager.list[rank][1];
            var number=manager.list[rank][2];
            manager.add(name,pic,number);
            manager.timeout=setTimeout(manager.check,1000);
        }else if(!manager.workinItem.status){
            if(manager.timeout){
                clearTimeout(manager.timeout);
                manager.timeout=null;
            }
            manager.timeout=setTimeout(manager.check,1000);
        }
    },
    
    construct:function(parentEl,list){
        manager.list=list;
        manager.parentEl=parentEl;
        manager.add(list[0][0],list[0][1],list[0][2]);
        manager.check();
    }
}
</script>
<style>
    .rankingItem{
        position: absolute;
        border:2px black solid;
        height:60px;
        width:90%;
    }
    .result{
        float :right;
        margin-right: 30px;
    }
</style>
    </head>
    <body>
<div id="ranking" style="padding: 10px; position: relative;"></div>
<?php
//parentEl,name,pic,rank,number
$array=array(
    array('asdad',20),
    array('qweqw',25),
    array('AASDA',40),
    array('jppl',22),
    array('qweqw',18)
);
echo "<script type='text/javascript'> manager.construct($('#ranking'),";
$list=array();
foreach ($array as $value) {
    $list[]="['".$value[0]."','',".$value[1]."]";
}
echo "[".  implode(',', $list)."]);</script>";
?>
    </body>
</html>
    
    