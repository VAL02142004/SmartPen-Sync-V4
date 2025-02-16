import Sound from "react-native-sound";

// Enable playback
Sound.setCategory("Playback");

// Background music (looped)
const backgroundMusic = new Sound(require("../assets/sounds/bg-music.mp3"), Sound.MAIN_BUNDLE, (error) => {
  if (!error) backgroundMusic.setNumberOfLoops(-1); // Loop indefinitely
});

// Sound effects
const sounds = {
  correct: new Sound(require("../assets/sounds/correct.mp3"), Sound.MAIN_BUNDLE),
  wrong: new Sound(require("../assets/sounds/wrong.mp3"), Sound.MAIN_BUNDLE),
  levelUp: new Sound(require("../assets/sounds/level-up.mp3"), Sound.MAIN_BUNDLE),
  gameOver: new Sound(require("../assets/sounds/game-over.mp3"), Sound.MAIN_BUNDLE),
};

// Function to play sound effects
export const playSound = (type) => {
  if (sounds[type]) {
    sounds[type].stop(() => sounds[type].play()); // Restart sound if already playing
  }
};

// Function to start background music
export const startBackgroundMusic = () => {
  backgroundMusic.play();
};

// Function to stop background music
export const stopBackgroundMusic = () => {
  backgroundMusic.stop();
};
