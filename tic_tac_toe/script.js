const startButton = document.getElementById("start-game");
const quitButton = document.getElementById("quit-game");
const startScreen = document.querySelector(".start-screen");
const gameContainer = document.querySelector(".game-container");
const cells = document.querySelectorAll(".cell");
const statusText = document.querySelector(".status");
const winnerModal = document.querySelector(".winner-modal");
const winnerMessage = document.getElementById("winner-message");

let currentPlayer = "X";
let board = ["", "", "", "", "", "", "", "", ""];
let gameActive = false;

const winningCombos = [
    [0, 1, 2],
    [3, 4, 5],
    [6, 7, 8],
    [0, 3, 6],
    [1, 4, 7],
    [2, 5, 8],
    [0, 4, 8],
    [2, 4, 6]
];

// ✅ Start Game
startButton.addEventListener("click", () => {
    startScreen.classList.add("hidden");
    gameContainer.classList.remove("hidden");
    gameActive = true;
});

// ✅ Quit Game (Return to Start Screen)
quitButton.addEventListener("click", () => {
    gameContainer.classList.add("hidden");
    startScreen.classList.remove("hidden");
    resetGame();
});

// ✅ Handle Cell Click
cells.forEach(cell => {
    cell.addEventListener("click", function() {
        const index = this.dataset.index;

        if (!board[index] && gameActive) {
            board[index] = currentPlayer;
            this.textContent = currentPlayer;
            this.style.color = currentPlayer === "X" ? "#ffcc00" : "#ff5733";
            checkWinner();
            currentPlayer = currentPlayer === "X" ? "O" : "X";
            statusText.textContent = `Player ${currentPlayer}'s Turn`;
        }
    });
});

// ✅ Check Winner
function checkWinner() {
    for (let combo of winningCombos) {
        const [a, b, c] = combo;
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
            gameActive = false;
            announceWinner(`🎉 Player ${currentPlayer} Wins!`);
            return;
        }
    }

    if (!board.includes("")) {
        gameActive = false;
        announceWinner("🤝 It's a Draw!");
    }
}

// ✅ Announce Winner
function announceWinner(message) {
    winnerMessage.textContent = message;
    winnerModal.classList.remove("hidden");

    setTimeout(() => {
        resetGame();
    }, 3000);
}

// ✅ Reset Game
function resetGame() {
    board = ["", "", "", "", "", "", "", "", ""];
    gameActive = true;
    currentPlayer = "X";
    statusText.textContent = `Player X's Turn`;
    cells.forEach(cell => {
        cell.textContent = "";
        cell.style.color = "";
    });
    winnerModal.classList.add("hidden");
}