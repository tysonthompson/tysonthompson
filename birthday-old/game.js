// Simple client‑side story collection and display
let stories = [];
let currentIndex = 0;

const storyInput = document.getElementById('story-input');
const submitBtn = document.getElementById('submit-btn');
const submitSection = document.getElementById('submit-section');
const displaySection = document.getElementById('display-section');
const storyText = document.getElementById('story-text');
const nextBtn = document.getElementById('next-btn');

submitBtn.addEventListener('click', () => {
  const text = storyInput.value.trim();
  if (!text) return;
  stories.push(text);
  storyInput.value = '';
  // Optionally keep the form for more entries; we just clear the field.
});

nextBtn.addEventListener('click', () => {
  if (stories.length === 0) return;
  storyText.textContent = stories[currentIndex];
  currentIndex = (currentIndex + 1) % stories.length;
});

// Show display area when at least one story submitted
function updateView() {
  if (stories.length > 0) {
    submitSection.style.display = 'none';
    displaySection.style.display = 'block';
    storyText.textContent = stories[0];
    currentIndex = 1;
  }
}

// Simple check every second to see if we should switch to display mode
setInterval(updateView, 1000);
