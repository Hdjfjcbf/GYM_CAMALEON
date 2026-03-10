<?php
// Incluir configuración y seguridad
// require_once 'config/config.php';
// Aquí iría tu validación de sesión (si no hay sesión, redireccionar al login)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM UPA | Dashboard Elite</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --carmesi-full: #ff0015; 
            --carmesi-base: #8b0000;
            --glass: rgba(255, 255, 255, 0.03);
            --border-glass: rgba(255, 0, 21, 0.15);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: #000;
            color: #fff;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Reutilizamos tu Canvas de Shaders para mantener consistencia */
        #canvas {
            position: fixed;
            top: 0; left: 0;
            z-index: -1;
            filter: brightness(0.4); /* Un poco más oscuro para que resalte el dashboard */
        }

        .main-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
            backdrop-filter: blur(5px);
        }

        /* --- SIDEBAR GLASS --- */
        .sidebar {
            background: rgba(0, 0, 0, 0.6);
            border-right: 1px solid var(--border-glass);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .logo h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            letter-spacing: -2px;
        }
        .logo span { color: var(--carmesi-full); text-shadow: 0 0 15px var(--carmesi-full); }

        .nav-menu { list-style: none; margin-top: 2rem; }
        .nav-item {
            margin-bottom: 0.5rem;
            padding: 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: 0.3s;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
        }
        .nav-item:hover, .nav-item.active {
            background: rgba(255, 0, 21, 0.1);
            color: #fff;
            border-left: 4px solid var(--carmesi-full);
        }

        /* --- CONTENT AREA --- */
        .content { padding: 3rem; overflow-y: auto; }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        .welcome-text h2 { font-size: 2.5rem; font-weight: 800; }
        .welcome-text p { color: var(--carmesi-full); letter-spacing: 2px; text-transform: uppercase; font-size: 0.8rem; }

        /* --- GRID DE TARJETAS --- */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .glass-card {
            background: var(--glass);
            border: 1px solid var(--border-glass);
            border-radius: 24px;
            padding: 2rem;
            transition: 0.4s;
            position: relative;
            overflow: hidden;
        }
        .glass-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 0, 21, 0.05);
            border-color: var(--carmesi-full);
        }

        .card-icon {
            background: rgba(255, 0, 21, 0.2);
            width: 50px; height: 50px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            color: var(--carmesi-full);
        }

        .card-title { font-size: 1.4rem; font-weight: 800; margin-bottom: 0.5rem; }
        .card-desc { color: rgba(255,255,255,0.6); font-size: 0.9rem; margin-bottom: 1.5rem; }

        .btn-action {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: var(--carmesi-full);
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 0.8rem;
            transition: 0.3s;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(255,255,255,0.05);
            padding: 0.5rem 1rem;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <canvas id="canvas"></canvas>

    <div class="main-container">
        <aside class="sidebar">
            <div class="logo">
                <h1>GYM <span>UPA</span></h1>
            </div>
            <nav class="nav-menu">
                <a href="#" class="nav-item active"><i data-lucide="layout-dashboard"></i> Dashboard</a>
                <a href="#" class="nav-item"><i data-lucide="dumbbell"></i> Mis Rutinas</a>
                <a href="#" class="nav-item"><i data-lucide="utensils"></i> Dieta</a>
                <a href="#" class="nav-item"><i data-lucide="calendar"></i> Asistencia</a>
                <a href="#" class="nav-item"><i data-lucide="settings"></i> Perfil</a>
            </nav>
        </aside>

        <main class="content">
            <header class="header-content">
                <div class="welcome-text">
                    <p>Bienvenido de vuelta</p>
                    <h2>Hola, Camaleón</h2>
                </div>
                <div class="user-profile">
                    <span>M. Ángel</span>
                    <i data-lucide="user-circle"></i>
                </div>
            </header>

            <div class="dashboard-grid">
                <div class="glass-card">
                    <div class="card-icon"><i data-lucide="flame"></i></div>
                    <h3 class="card-title">Entrenamiento</h3>
                    <p class="card-desc">Accede a tus rutinas personalizadas de hoy y registra tu progreso.</p>
                    <a href="rutinas.php" class="btn-action">VER RUTINA</a>
                </div>

                <div class="glass-card">
                    <div class="card-icon"><i data-lucide="library"></i></div>
                    <h3 class="card-title">Biblioteca</h3>
                    <p class="card-desc">Explora la base de datos de ejercicios con técnica correcta.</p>
                    <a href="ejercicios.php" class="btn-action">EXPLORAR</a>
                </div>

                <div class="glass-card">
                    <div class="card-icon"><i data-lucide="trending-up"></i></div>
                    <h3 class="card-title">Estadísticas</h3>
                    <p class="card-desc">Visualiza tus cambios físicos y récords personales (PRs).</p>
                    <a href="#" class="btn-action">VER GRÁFICAS</a>
                </div>
            </div>
        </main>
    </div>

    <script type="module">
        import { Renderer, Program, Mesh, Triangle } from 'https://cdn.skypack.dev/ogl';

        const vertex = `attribute vec2 position; void main() { gl_Position = vec4(position, 0, 1); }`;
        const fragment = `
            precision highp float;
            uniform float uTime;
            uniform vec2 uResolution;

            vec2 hash(vec2 p) {
                p = vec2(dot(p, vec2(127.1, 311.7)), dot(p, vec2(269.5, 183.3)));
                return fract(sin(p) * 43758.5453) * 2.0 - 1.0;
            }

            float noise(vec2 p) {
                vec2 i = floor(p); vec2 f = fract(p);
                vec2 u = f*f*(3.0-2.0*f);
                return mix(mix(dot(hash(i + vec2(0,0)), f - vec2(0,0)),
                           dot(hash(i + vec2(1,0)), f - vec2(1,0)), u.x),
                           mix(dot(hash(i + vec2(0,1)), f - vec2(0,1)),
                           dot(hash(i + vec2(1,1)), f - vec2(1,1)), u.x), u.y);
            }

            float fbm(vec2 p) {
                float v = 0.0; float a = 0.5;
                for (int i = 0; i < 5; i++) {
                    v += a * noise(p); p *= 2.0; a *= 0.5;
                }
                return v;
            }

            void main() {
                vec2 uv = gl_FragCoord.xy / uResolution.xy;
                vec2 p = (uv * 2.0 - 1.0) * 1.5;
                p.x *= uResolution.x / uResolution.y;
                float t = uTime * 0.15;
                vec2 q = vec2(fbm(p + t * 0.1), fbm(p + vec2(5.2, 1.3)));
                vec2 r = vec2(fbm(p + 4.0 * q + vec2(1.7, 9.2) + t), fbm(p + 4.0 * q + vec2(8.3, 2.8) + t));
                float f = fbm(p + 4.0 * r);
                vec3 col = mix(vec3(0.0), vec3(0.6, 0.0, 0.03), clamp((f*f)*4.0, 0.0, 1.0));
                col += 0.4 * pow(f, 3.0) * vec3(1.0, 0.0, 0.1);
                gl_FragColor = vec4(col, 1.0);
            }
        `;

        const renderer = new Renderer({ canvas: document.getElementById('canvas'), dpr: 1 });
        const gl = renderer.gl;
        const program = new Program(gl, {
            vertex, fragment,
            uniforms: { uTime: { value: 0 }, uResolution: { value: [0, 0] } }
        });
        const mesh = new Mesh(gl, { geometry: new Triangle(gl), program });

        function resize() {
            renderer.setSize(window.innerWidth, window.innerHeight);
            program.uniforms.uResolution.value = [window.innerWidth, window.innerHeight];
        }
        window.addEventListener('resize', resize);
        resize();

        function update(t) {
            program.uniforms.uTime.value = t * 0.001;
            renderer.render({ scene: mesh });
            requestAnimationFrame(update);
        }
        requestAnimationFrame(update);
        
        // Inicializar iconos
        lucide.createIcons();
    </script>
</body>
</html>