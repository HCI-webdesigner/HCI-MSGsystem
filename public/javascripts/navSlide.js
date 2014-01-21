//获取元素的高度，兼容ie
function getElementTop(element) {
    var actualTop = element.offsetTop; //当前元素高度
    var current = element.offsetParent; //父元素高度
    //循环至最外层
    while (current != null) {
        actualTop += current.offsetTop;
        current = current.offsetParent;
    }
    return actualTop;
}

//获取滚动条隐藏的页面高度，兼容ie
function getScrollTop() {
    return document.documentElement.scrollTop || document.body.scrollTop;
}

//设置滚动条高度，兼容ie
function setScrollTop(value) {
    if (document.documentElement.scrollTop) {
        document.documentElement.scrollTop = value;
    } else {
        document.body.scrollTop = value;
    }
}

function initSlide(pNum) {
    var navSlider = document.getElementById('menuLabel'); //高亮栏
    var initTop = 26; //高亮栏初始高度
    var num = 0; //鼠标指向栏
    var liHeight = 50; //单元栏高
    var tops = 0; //目标高度  
    var gtb = document.getElementById("goTopBtn"); //返回顶部按钮
    var nav = document.getElementById('nav');
    var mUl = document.getElementById('menuList');
    var bLi = mUl.getElementsByTagName('li');
    var result = [];
    var container = document.getElementById('container');
    var footer_offsetTop = getElementTop(footer);
    var nav_offsetTop = getElementTop(nav); //导航栏当前的页面高度
    var nav_len = nav.offsetHeight; //导航栏自身长度
    var container_offsetTop = getElementTop(container); //正文主体当前的页面高度
    var container_len = container.offsetHeight; //正文自身长度
    var pageNum = pNum;
    var footer_len = footer.offsetHeight;



    //添加滚动事件，包括导航栏和返回顶部按钮
    window.onscroll = function() {

        //返回顶部按钮是否显示
        getScrollTop() > 300 ? gtb.style.display = "inline" : gtb.style.display = "none";

        //导航栏如若到底改变其在页面位置
        if (getScrollTop() > (footer_offsetTop - nav_len)) {
            nav.style.position = "absolute";
            nav.style.top = (footer_offsetTop - nav_len) + "px";
        } else {
            nav.style.position = "fixed";
            nav.style.top = "0px";
        }
    }


    //返回顶部按钮点击事件添加
    gtb.onclick = function() {
        var goTop = setInterval(scrollMore, 10);
        //动态回滚
        function scrollMore() {
            setScrollTop(getScrollTop() / 1.1);
            if (getScrollTop() < 1) clearInterval(goTop);
        }
    }

    //鼠标离开高亮栏则回至本页面对应栏
    nav.onmouseleave = function() {
        moveNavSlider(pageNum * liHeight + initTop);
  };

    //为每个导航栏添加鼠标事件
    for (var i = bLi.length - 1; i >= 0; i--) {
        result[i] = function(num) {
            bLi[num].onmouseover = function() {
                moveNavSlider(getSliderTop(num));
            }
        }(i);

    };

    //获取高亮导航栏返回位置高度值函数
    function getSliderTop(num) {
        return num * liHeight + initTop;
    }


    //高亮栏移动函数
    function moveNavSlider(tops) {
        var navSlider = document.getElementById('menuLabel');
        var t = navSlider.style.top; //获取当前的Top属性
        t = Number(t.substring(0, t.length - 2));

        //改变高亮栏高度
        function setNavSliderTop(tops) {
            //逐渐逼近
            if (t != tops) {
                if (tops > t) {
                    t = t + 5;
                    if (tops < t) {
                        t = tops;
                    }
                } else if (tops < t) {
                    t = t - 5;
                    if (tops > t) {
                        t = tops;
                    }
                }
            }
            navSlider.style.top = t + "px";
        }

        //清除循环对象    
        if (loopMove) {
            clearInterval(loopMove);
        }

        //循环修改至目标位置
        var loopMove = setInterval(function() {

            if (t == tops) {
                clearInterval(loopMove);
            } else {
                setNavSliderTop(tops);
            }
        }, 1);
    }
}