  (function () {
    // Sticky nav shadow on scroll
    var nav = document.getElementById("siteNav");
    window.addEventListener("scroll", function () {
      if (window.scrollY > 8) nav.classList.add("is-scrolled");
      else nav.classList.remove("is-scrolled");
    }, { passive: true });
  })();

  (function () {
    // Build a Version-1-style QR silhouette (21x21 modules) with real finder
    // patterns and a timing row/column, plus a gold "hidden signature" diagonal.
    var N = 21, cell = 10;
    var ns = "http://www.w3.org/2000/svg";
    var g = document.getElementById("grid");

    function inFinder(r, c) {
      var anchors = [[0,0],[0,14],[14,0]];
      for (var i = 0; i < anchors.length; i++) {
        var ar = anchors[i][0], ac = anchors[i][1];
        if (r >= ar && r < ar + 7 && c >= ac && c < ac + 7) {
          return { local: true, lr: r - ar, lc: c - ac };
        }
      }
      return null;
    }

    function finderFilled(lr, lc) {
      if (lr === 0 || lr === 6 || lc === 0 || lc === 6) return true;
      if (lr === 1 || lr === 5 || lc === 1 || lc === 5) return false;
      return true; // inner 3x3 eye
    }

    var delayStep = 0.0035;
    var i = 0;

    for (var r = 0; r < N; r++) {
      for (var c = 0; c < N; c++) {
        var fill = false;
        var accent = false;

        var f = inFinder(r, c);
        if (f) {
          fill = finderFilled(f.lr, f.lc);
        } else if (r === 6 && c >= 8 && c <= 12) {
          fill = (c % 2 === 0);
        } else if (c === 6 && r >= 8 && r <= 12) {
          fill = (r % 2 === 0);
        } else {
          fill = ((r * 31 + c * 17 + r * c) % 7) < 3;
          var diag = (r - c + N) % N;
          if (fill && diag >= 9 && diag <= 11) accent = true;
        }

        if (!fill) continue;

        var rect = document.createElementNS(ns, "rect");
        rect.setAttribute("x", c * cell + 0.6);
        rect.setAttribute("y", r * cell + 0.6);
        rect.setAttribute("width", cell - 1.2);
        rect.setAttribute("height", cell - 1.2);
        rect.setAttribute("rx", 1.3);
        rect.setAttribute("fill", accent ? "var(--gold)" : "var(--ink)");
        rect.style.opacity = accent ? "1" : (f ? "0.92" : "0.5");
        rect.style.animationDelay = (i * delayStep) + "s";
        g.appendChild(rect);
        i++;
      }
    }
  })();
