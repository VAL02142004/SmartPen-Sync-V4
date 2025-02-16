export const words = {
  easy: [
    "apple", "ball", "cat", "dog", "fish", "grape", "house", "ice", "juice", "kite",
    "lion", "mango", "nest", "orange", "pencil", "queen", "rain", "sun", "tree", "umbrella"
  ],

  normal: [
    "banana", "guitar", "jungle", "library", "mountain", "notebook", "octopus", "pyramid", 
    "quartz", "rainbow", "scooter", "tornado", "universe", "volcano", "whistle", "xylophone", 
    "yogurt", "zeppelin", "avocado", "backpack"
  ],

  hard: [
    "abundant", "ballistic", "catalyst", "diligent", "exquisite", "frivolous", "gregarious", 
    "harbinger", "insidious", "juxtapose", "labyrinth", "meticulous", "nostalgic", "obscure", 
    "paradox", "quizzical", "resilient", "serendipity", "tenacity", "ubiquitous"
  ],

  expert: [
    "acrimonious", "belligerent", "circumlocution", "deleterious", "equanimity", "fastidious", 
    "gregarious", "heterogeneous", "idiosyncratic", "juxtaposition", "kaleidoscope", "lugubrious", 
    "magnanimous", "nefarious", "obfuscate", "parsimonious", "quintessential", "recalcitrant", 
    "serendipity", "tenacious", "ubiquitous", "vexatious", "whimsical", "xenophobic", 
    "yammering", "zealous", "altruistic", "benevolent", "cacophony", "dichotomy"
  ],

  animals: ["tiger", "elephant", "giraffe", "penguin"],
  science: ["gravity", "molecule", "atom", "neutron"],
  sports: ["soccer", "basketball", "tennis", "volleyball"]
};

/**
 * Get a word based on the current level.
 * @param {number} level - Player's level.
 * @returns {string} - A random word from the corresponding level category.
 */
export const getWordByLevel = (level) => {
  if (level >= 1 && level <= 20) {
    return words.easy[Math.floor(Math.random() * words.easy.length)];
  } else if (level >= 21 && level <= 40) {
    return words.normal[Math.floor(Math.random() * words.normal.length)];
  } else if (level >= 41 && level <= 60) {
    return words.hard[Math.floor(Math.random() * words.hard.length)];
  } else if (level >= 61 && level <= 100) {
    return words.expert[Math.floor(Math.random() * words.expert.length)];
  } else {
    return "Invalid Level"; // Error handling
  }
};