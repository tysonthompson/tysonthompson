<?php
session_start();
$stories_file = 'stories.json';
$password = 'TomChater18';

// Ensure stories file exists and is writable
if (!file_exists($stories_file)) {
    file_put_contents($stories_file, json_encode([]));
}

// Handle submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_GET['pass'])) {
    $story = trim($_POST['story'] ?? '');
    if ($story) {
        $stories = json_decode(file_get_contents($stories_file), true);
        $stories[] = $story;
        file_put_contents($stories_file, json_encode($stories));
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
}

// Determine if we're in view mode
$view = (isset($_GET['pass']) && $_GET['pass'] === $password);
$stories = json_decode(file_get_contents($stories_file), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Birthday Story Game</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<?php include __DIR__ . '/style.css'; ?>
</style>
</head>
<body>
<h1>Birthday Story Game</h1>

<?php if (!$view): ?>
<div id="submit-section">
  <p>Submit your anonymous story below.</p>
  <form method="POST">
    <textarea name="story" id="story-input" rows="4" placeholder="Enter a funny true story (anonymous)"></textarea>
    <button type="submit">Submit Story</button>
  </form>
  <p>When everyone has submitted, enter the password <strong>TomChater18</strong> to view all stories.</p>
  <p><a href="?pass=<?= $password ?>">Enter Password</a></p>
</div>
<?php else: ?>
<div id="display-section">
  <?php if (empty($stories)): ?>
    <p>No stories submitted yet.</p>
  <?php else: ?>
    <p id="story-text"><?= htmlspecialchars($stories[0]); ?></p>
    <button id="next-btn">Next Story</button>
  <?php endif; ?>
</div>
<script>
const stories = <?= json_encode($stories); ?>;
let current = 0;
document.getElementById('next-btn').addEventListener('click', () => {
  current = (current + 1) % stories.length;
  document.getElementById('story-text').textContent = stories[current];
});
</script>
</body>
</html>
<?php endif; ?>