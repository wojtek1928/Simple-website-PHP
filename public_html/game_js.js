var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

var direction='ne';
var padDirect, counter, interval,posX,posY,multiplier;

canvas.parentElement.parentElement.style.textAlign='center';
canvas.style.backgroundColor='white';

if(((window.innerHeight)*0.9)%2!=0)width=height=((window.innerHeight)*0.9)+1;
else width=height=(window.innerHeight)*0.9;

canvas.width=width;
canvas.height=height;

const ball = {
    radius : 0.02*(canvas.width),
    x0 : Math.round(Math.random()*canvas.width),
    y0 : Math.round(canvas.height*0.03),
};

const p = {
    w : Math.round(0.2*(canvas.width)),
    h : Math.round(0.05*(canvas.width)),
    x0 : Math.round((canvas.width)/2-0.1*(canvas.width)),
    y0 : Math.round((canvas.height)*0.9),
};

ctx.fillStyle = 'red';
var circle = new Path2D();
circle.arc(ball.x0, ball.y0, ball.radius, 0, 2*Math.PI);
ctx.fill(circle);
ctx.moveTo(0,0);
ctx.fill(circle);
document.getElementById("start").addEventListener("click",start);

ctx.fillStyle='blue';
ctx.fillRect(p.x0,p.y0,p.w,p.h);

var onMouseMove = function (ev) {
    posX = ev.offsetX,
    posY = ev.offsetY;
};


function start(){
    document.getElementById("start").style.display="none";
    x=ball.x0;
    y=ball.y0;
    multiplier=0;
    counter=0;
    function timing(){
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        window.requestAnimationFrame(timing);
        ball_moving();
        paddle_moving();
        ctx.fillStyle='purple';
        ctx.font = (canvas.height*0.03)+'px calibri';
        ctx.fillText('Wynik: '+counter,canvas.width*0.05,canvas.height*0.97);
    }
    timing();
}

function ball_moving(){
    ctx.fillStyle = 'red';
    multiplier=2+counter;
    var circle = new Path2D();
    circle.arc(x, y, ball.radius, 0, 2*Math.PI);
    ctx.fill(circle);
    if(y<=0)direction=changeDirection(direction,1,'normal');
    else if(y>(p.y0+multiplier-ball.radius))loss(counter);
    else if((y-p.y0+ball.radius)>=0&&x>(posX-p.w*0.5)&&x<(posX+p.w*0.5))direction=changeDirection(direction,1,padDirect);
    else if((x-canvas.width)>=0||x<=0)direction=changeDirection(direction,0);

    switch (direction) {
        case 'n':
            y-=multiplier;
            break;
        case 'ne':
            y-=multiplier;
            x+=multiplier;
            break;
        case 'se':
            y+=multiplier;
            x+=multiplier;
            break;
        case 's':
            y+=multiplier;
            break;
        case 'sw':
            y+=multiplier;
            x-=multiplier;
            break;
        case 'nw':
            y-=multiplier;
            x-=multiplier;
            break;
        default:
            break;
    }
} 
function changeDirection(direction,kind,reflection_type){
    if(kind){

        if(direction=='s'||direction=='sw'||direction=='se')counter++;
        
        if(reflection_type=="normal"){
        switch (direction) {
            case 'n':
                return 's'
                break;
            case 'nw':
                return 'sw';
                    break;    
            case 'se':
                return 'ne';
                break;
            case 's':
                return 'n';
                break;
            case 'sw':
                return 'nw';
                break;
            case 'ne':
                return 'se';
                    break;
                break;
            default:
                break;
            }
        }
        else if(reflection_type=="right"){
            switch (direction) {
                case 'se':
                    return 'ne';
                    break;
                case 's':
                    return 'ne';
                    break;
                case 'sw':
                    return 'n';
                    break;
                default:
                    break;
                }
        }
        else if(reflection_type=="left"){
            switch (direction) {
                case 'se':
                    return 'n';
                    break;
                case 's':
                    return 'nw';
                    break;
                case 'sw':
                    return 'nw';
                    break;
                default:
                    break;
                }
        }
    }
    else{
        switch (direction) {
            case 'n':
                return 's'
                break;
            case 'ne':
            return 'nw';
                break;
            case 'se':
                return 'sw';
                break;
            case 's':
                return 'n';
                break;
            case 'sw':
                return 'se';
                break;
            case 'nw':
                return 'ne';
                break;
            default:
                break;
            }
    }    
}
function paddle_moving(){
    ctx.fillStyle = 'blue';
    document.getElementById('canvas').addEventListener("mousemove", onMouseMove);
    if(posX<(0.5*p.w))posX=p.w*0.5;
    if(posX>(canvas.width-0.5*p.w))posX=canvas.width-0.5*p.w;
    ctx.fillRect((posX-p.w*0.5),p.y0,p.w,p.h);
    paddle_direction(posX);
}
function paddle_direction(previosPosition){
        setTimeout(() => {
            if(posX<previosPosition)padDirect="left";
            else if(posX>previosPosition)padDirect="right";
            else padDirect="normal";
        }, 200);
}

function loss(count){
    
    ctx.fillStyle='black';
    ctx.font = (canvas.height*0.15)+'px calibri';
    ctx.fillText('Koniec gry',canvas.width*0.05,canvas.height*0.35);
    ctx.fillStyle='purple';
    ctx.font = (canvas.height*0.1)+'px calibri';
    ctx.fillText('Twój wynik: '+count,canvas.width*0.05,canvas.height*0.5);
    document.getElementById("start").style.display="";
    Window.cancelAnimationFrame(timing);
}