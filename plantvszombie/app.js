const rows = 5;
const cols = 9;
const cellSize = 80;

const game = document.getElementById("game");

let plants = [];
let zombies = [];
let bullets = [];

let lastZombieSpawn = 0;

//////////////////////
// CREATE GRID
//////////////////////
function createGrid() {
  for (let i = 0; i < rows * cols; i++) {
    const cell = document.createElement("div");
    cell.classList.add("cell");
    cell.addEventListener("click", () => placePlant(i));
    game.appendChild(cell);
  }
}

//////////////////////
// PLACE PLANT
//////////////////////
function placePlant(index) {
  if (plants.find(p => p.index === index)) return;

  plants.push({
    index,
    hp: 5,
    shootCooldown: 0
  });
}

//////////////////////
// SPAWN ZOMBIE
//////////////////////
function spawnZombie() {
  const row = Math.floor(Math.random() * rows);

  zombies.push({
    x: cols * cellSize,
    row,
    hp: 5,
    speed: 20,
    attacking: false
  });
}

//////////////////////
// GAME LOOP
//////////////////////
let lastTime = 0;

function gameLoop(timestamp) {
  const delta = (timestamp - lastTime) / 1000;
  lastTime = timestamp;

  update(delta);
  render();

  requestAnimationFrame(gameLoop);
}

//////////////////////
// UPDATE
//////////////////////
function update(delta) {
  // Spawn zombie tiap 4 detik
  if (performance.now() - lastZombieSpawn > 4000) {
    spawnZombie();
    lastZombieSpawn = performance.now();
  }

  updatePlants(delta);
  updateZombies(delta);
  updateBullets(delta);

  checkCollisions();
}

//////////////////////
// UPDATE PLANTS
//////////////////////
function updatePlants(delta) {
  plants.forEach(p => {
    p.shootCooldown -= delta;

    const plantRow = Math.floor(p.index / cols);

    const zombieInRow = zombies.find(z => z.row === plantRow);

    if (zombieInRow && p.shootCooldown <= 0) {
      bullets.push({
        x: (p.index % cols) * cellSize + 40,
        row: plantRow,
        speed: 200
      });

      p.shootCooldown = 1; // 1 detik
    }
  });
}

//////////////////////
// UPDATE ZOMBIES
//////////////////////
function updateZombies(delta) {
  zombies.forEach(z => {
    if (!z.attacking) {
      z.x -= z.speed * delta;
    }

    if (z.x <= 0) {
      alert("Game Over!");
      location.reload();
    }
  });
}

//////////////////////
// UPDATE BULLETS
//////////////////////
function updateBullets(delta) {
  bullets.forEach(b => {
    b.x += b.speed * delta;
  });

  bullets = bullets.filter(b => b.x < cols * cellSize);
}

//////////////////////
// COLLISION
//////////////////////
function checkCollisions() {

  // Bullet vs Zombie
  bullets.forEach(b => {
    zombies.forEach(z => {
      if (
        b.row === z.row &&
        b.x > z.x &&
        b.x < z.x + 60
      ) {
        z.hp -= 1;
        b.hit = true;
      }
    });
  });

  bullets = bullets.filter(b => !b.hit);
  zombies = zombies.filter(z => z.hp > 0);

  // Zombie vs Plant
  zombies.forEach(z => {
    const col = Math.floor(z.x / cellSize);
    const index = z.row * cols + col;

    const plant = plants.find(p => p.index === index);

    if (plant) {
      z.attacking = true;
      plant.hp -= 0.02;

      if (plant.hp <= 0) {
        plants = plants.filter(p => p !== plant);
        z.attacking = false;
      }
    } else {
      z.attacking = false;
    }
  });
}

//////////////////////
// RENDER
//////////////////////
function render() {
  document.querySelectorAll(".plant, .zombie, .bullet")
    .forEach(el => el.remove());

  plants.forEach(p => {
    const cell = game.children[p.index];
    const plantDiv = document.createElement("div");
    plantDiv.classList.add("plant");
    cell.appendChild(plantDiv);
  });

  zombies.forEach(z => {
    const zombie = document.createElement("div");
    zombie.classList.add("zombie");
    zombie.style.left = z.x + "px";
    zombie.style.top = z.row * cellSize + 10 + "px";
    game.appendChild(zombie);
  });

  bullets.forEach(b => {
    const bullet = document.createElement("div");
    bullet.classList.add("bullet");
    bullet.style.left = b.x + "px";
    bullet.style.top = b.row * cellSize + 30 + "px";
    game.appendChild(bullet);
  });
}

//////////////////////
// START
//////////////////////
createGrid();
requestAnimationFrame(gameLoop);
