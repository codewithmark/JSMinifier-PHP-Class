# JSMinifier (PHP)

**JSMinifier** is a simple PHP class that helps you:

- ✂️ Minify (shrink) your JavaScript files
- 📦 Combine all JS files into one
- 📁 Automatically scan through subfolders
- 🚫 No external tools or libraries required

This tool is perfect if you're building websites with PHP and want to speed up your site without using Node.js, Composer, or any complicated setup.

---

## 💡 Why Use JSMinifier?

When working on web projects, you often end up with many JavaScript files. These files may be large, full of comments, or spread across different folders. This can cause:

- ⚠️ Slower website performance  
- 📂 Too many `<script>` tags  
- 🐌 More data to load for your users  

**JSMinifier helps by:**

- Making your JavaScript files smaller  
- Combining them into one single file (like `bundle.min.js`)  
- Making your site load faster and cleaner  

---

## ✅ Features

- 🔍 Recursively searches all folders for `.js` files  
- 🧹 Minifies JavaScript by removing comments and spaces  
- 📦 Combines all files into one output file  
- 🚫 Skips files that are already minified (`*.min.js`)  
- 🟢 No setup — just one PHP file  

---

## 📦 Installation

No need to install anything. Just copy `JSMinifier.php` into your project folder.

Your project might look like this:

my-project/
├── JSMinifier.php
└── src/
└── js/
├── main.js
└── utils/
└── helper.js


---

## 🧑‍💻 How to Use

Create a PHP script that will run the minifier:

```php
<?php
require_once 'JSMinifier.php';

$sourceFolder = __DIR__ . '/src/js';              // Where your JS files are
$outputFile   = __DIR__ . '/dist/bundle.min.js';  // Where to save the result

$minifier = new JSMinifier($sourceFolder, $outputFile);
$minifier->compileIntoOneFile();

echo "✅ All JS files combined and minified into: bundle.min.js\n";


When you run this, it will:

Find all .js files inside src/js/ and its subfolders

Minify them

Save them all in one file: dist/bundle.min.js

📁 Output Example
After running the script:

my-project/
└── dist/
    └── bundle.min.js  ← Contains all your minified JS

This file is ready to include in your HTML:
<script src="dist/bundle.min.js"></script>


🔄 When to Use It
Before deploying your website to production

During your build or deployment script

Anytime you make changes to your JS files

🧠 Good for Beginners
If you're just starting out:

You don’t need Node.js, NPM, or build tools

You only need basic PHP knowledge

This class helps you optimize your project fast

💬 Tips
You can keep using your original .js files during development

Just re-run the minifier to update your bundle.min.js

Keep a backup if you overwrite files directly (optional feature)

🔐 License
This project is open source under the MIT License — free to use, modify, and share.

🙌 Final Note
JSMinifier is great for:

Small to medium PHP projects

Legacy systems without modern JS build tools

Quick minification and bundling with no setup

Drop it in, run it, and deploy 🚀

---

Let me know if you'd like a badge (like “No Dependencies” or “MIT License”) added at the top.
