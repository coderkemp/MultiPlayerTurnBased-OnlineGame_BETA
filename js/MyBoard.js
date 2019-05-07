window.rollDice = () =>{
    const max=6;
    const roll = Math.ceil(Math.random() * max);
    console.log("You rolled",roll);
    let currentPlayer = players[currentPlayerTurn];
    currentPlayer.position += roll;
    ladders.forEach(ladder=>{
        if(ladder.start == currentPlayer.position){
            console.log("you stepped on a Ladder!");
            currentPlayer.position = ladder.end;
        }
    });
    currentPlayerTurn++;
    //--Below code if playerturn equals or gets more than players length,it means player2 has played and again it's the turn of player1
    if(currentPlayerTurn >= players.length){
        currentPlayerTurn=0; 
    }
    //console.log(currentPlayer);
    renderBoard();  
}

//player creation in the video from 14th minute
const players = [{
    name:"Abhi",
    position:0,
    color:"gold" ;
},{
    name:"Prof",
    position:0,
    color: 
}];

const ladders = [{
    start: 5,
    end: 22
}];
  
const snakes=[{
    start: 50,
    end: 34
}]; 
let currentPlayerTurn = 0;

const width=9;
const height=9;
const board = [];
let position=0; //each square has a unique position greater than the square before
let blackSquare = false;

for(var y=height;y>=0;y--){
    let row=[];
    board.push(row);
    for(var x=0;x<width;x++){
        row.push(x,y,occupied:null,position,color: blackSquare ? "steelblue":"silver") ;
        blackSquare = !blackSquare; //alternate between the colours 'red' & 'black' 
        position++;  
    }
} 

console.log(board);
const boardSizeConst=50;

//----------------renderBoard function---------------------------
const renderBoard = ()=>{
    let boardHTML=``;
    board.forEach(row=>{
        row.forEach(square=>{
            boardHTML.innerHTML+=`<div class=square style="top:${square.y * boardSizeConst}px;left:${square.x * boardSizeConst}px"></div>`
        });
    });
    
    players.forEach(player=>{
       let square=null;
       board.forEach(row=>{
       row.forEach(square=>{
           if(square.position == player.position){
               console.log("Player is on this square", square);
               boardHTML += `<div class=player style="top:${square.y * boardSizeConst  + 5}px;left:${square.x * boardSizeConst + 5}px;background-color:${player.color}"></div>`; 
           }  
        });
    });
    }); 
//--code for ladder    
    ladders.forEach(ladder=>{
        drawLine({color:"green"});
        let startPos = {x:0,y:0}; 
        let endPos = {x:0,y:0};
        board.forEach(row=>{
        row.forEach(square=>{
         if(square.position == ladder.start){
               startPos.x = square.x * boardSizeConst;
               startPos.y = square.y * boardSizeConst;
           }  
         if(square.position == ladder.end){
               endPos.x = square.x * boardSizeConst;
               endPos.y = square.y * boardSizeConst;
           } 
        });
    });
     drawLine({color:"green",startPos,endPos});
    });
//---code for snake
    snakes.forEach(snake=>{
        drawLine({color:"white"});
        let startPos = {x:0,y:0}; 
        let endPos = {x:0,y:0};
        board.forEach(row=>{
        row.forEach(square=>{
         if(square.position == snake.start){
               startPos.x = square.x * boardSizeConst;
               startPos.y = square.y * boardSizeConst;
           }  
         if(square.position == snake.end){
               endPos.x = square.x * boardSizeConst;
               endPos.y = square.y * boardSizeConst;
           } 
        });
    });
     drawLine({color:"white",startPos,endPos});
    });
    document.getElementById("board").innerHTML=boardHTML;
    console.log("Render Board");
}
  
//function to draw a line  
function drawLine({color,startPos,endPos}){
    var c=document.getElementById("canvas");
    var ctx=c.getContext("2d");
    ctx.beginPath();
    const sizeRatio=1;
    ctx.moveTo(startPos.x+25, startPos.y+25);
    ctx.lineTo(endPos.x+25,endPos.y+25);
    ctx.lineWidth=15;
    ctx.strokeStyle=color;
    ctx.stroke();
}
renderBoard();