/*     
create game table, and pass on values to it and chech whether values getting updated in db
thank think about ajax call update
*/

var hasWon = false;
var player1 = $("#UserName").val();
var player2 = $("#Opponent").val();
var gameId = $("#GameId").val();
console.log("name of first player: ",player1);
console.log("name of second player: ",player2);
console.log("Game ID is: ",gameId);

window.rollDice = ()=>{
  if (hasWon) {
    return;
  }
  const max = 6;
  const roll = Math.ceil(Math.random() * max);
  $('.rolledValue').html("Rolled Dice Value is: " + roll);
  console.log("You rolled", roll);
  let currentPlayer = players[currentPlayerTurn];
  console.log("Current player is: ",currentPlayer);
  currentPlayer.position += roll;
    
  ladders.forEach(ladder=>{
    if (ladder.start === currentPlayer.position) {
      console.log("You stepped on a ladder!");
      currentPlayer.position = ladder.end;
    }
  });
  
  if (currentPlayer.position === position) {
    console.log("Player has won!");
    hasWon = true;
  }
  if (currentPlayer.position === position) {
    const diff = currentPlayer.position - position;
    currentPlayerPosition = position - diff;
  }
  
  currentPlayerTurn ++;  //player changes here
  if (currentPlayerTurn >= players.length) {
    currentPlayerTurn = 0;
  }
  renderBoard();
}

const players = [{
  name: player1,
  position: 0,
  color: "gold"
},{
  name:player2,
  position: 0,
  color: "white"
}];

let currentPlayerTurn = 0;

const width = 9;
const height = 9;
const board = [];
let position = 0;
let blackSquare = false;
const ladders = [{
  start: 2,
  end: 22
},{
  start: 50,
  end: 34
},{
  start: 10,
  end: 44
},{
  start: 61,
  end: 19
},{
  start: 70,
  end: 83
},{
  start:78,
  end: 4
}];

for (var y = height; y >= 0; y--) {
  let row = [];
  
  board.push(row);
  for (var x = 0; x < width; x++) {
    
    row.push({x,y,occupied:null,position,color: blackSquare ? "steelblue" : "silver"});
    blackSquare = !blackSquare;
    position ++;
  }
}

const boardSizeConst = 50;

var renderBoard = ()=>{
  let boardHTML = ``;
  board.forEach(row=>{
    row.forEach(square=>{
      boardHTML += `<div class=square style="top:${square.y * boardSizeConst}px; left:${square.x * boardSizeConst}px; background-color:${square.color}"></div>`
    });
  });
  
  players.forEach(player=>{
    let square = null;
    board.forEach(row=>{
    row.forEach(square=>{
          if (square.position === player.position) {
            boardHTML += `<div class=player style="top:${square.y * boardSizeConst + 5}px; left:${square.x * boardSizeConst + 5}px;background-color:${player.color}"></div>`;
          }
      });
    });
  });
  
  ladders.forEach(ladder=>{
    
    //let start = 0;
    let startPos = {x:0,y:0};
    let endPos = {x:0,y:0};
    
    board.forEach(row=>{
      row.forEach(square=>{
        if (square.position === ladder.start) {
          startPos.x = square.x * boardSizeConst;
          startPos.y = square.y * boardSizeConst;
        }
        
        if (square.position === ladder.end) {
          endPos.x = square.x * boardSizeConst;
          endPos.y = square.y * boardSizeConst;
        }
      });
    });
    
    const isLadder = ladder.end > ladder.start;
    
    drawLine({color : isLadder ? "green" : "red",startPos,endPos});
  });
  console.log("BOARD HTML :  ", boardHTML);
  document.getElementById("board").innerHTML = boardHTML;
}

function drawLine({color,startPos,endPos}){
  
  var c=document.getElementById("canvas");
  var ctx=c.getContext("2d");
  ctx.beginPath();
  const sizeRatio = 1;
  ctx.moveTo(startPos.x + 25,startPos.y + 25);
  ctx.lineTo(endPos.x + 25,endPos.y + 25 );
 
  ctx.lineWidth = 15;
  ctx.strokeStyle = color;
  ctx.stroke();
}

renderBoard();
