@extends('layouts.app')

@section('content')

<style>
    /* ════════════════════════════════
       HERO
    ════════════════════════════════ */
    .hero {
        background: var(--dark);
        padding: 96px 20px 108px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    /* rejilla decorativa de fondo */
    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(6,182,212,.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(6,182,212,.06) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
    }
    .hero__inner { position: relative; z-index: 1; }

    .hero__eyebrow {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: var(--accent);
        background: rgba(6,182,212,.1);
        border: 1px solid rgba(6,182,212,.25);
        border-radius: 999px;
        padding: 5px 18px;
        margin-bottom: 26px;
    }
    .hero__title {
        font-size: clamp(34px, 5.5vw, 62px);
        font-weight: 900;
        color: #fff;
        line-height: 1.12;
        letter-spacing: -.8px;
        margin-bottom: 20px;
    }
    .hero__title span { color: var(--accent); }
    .hero__subtitle {
        font-size: 18px;
        color: rgba(255,255,255,.55);
        max-width: 520px;
        margin: 0 auto 40px;
        line-height: 1.7;
    }
    .hero__actions {
        display: flex;
        gap: 14px;
        justify-content: center;
        flex-wrap: wrap;
    }
    .btn-hero-primary {
        background: var(--primary);
        color: #fff;
        border-color: var(--primary);
        font-size: 15px;
        padding: 14px 32px;
        border-radius: 12px;
        font-weight: 800;
    }
    .btn-hero-primary:hover { background: var(--primary-dark); transform: translateY(-2px); }
    .btn-hero-outline {
        background: transparent;
        color: rgba(255,255,255,.75);
        border: 1px solid rgba(255,255,255,.2);
        font-size: 15px;
        padding: 14px 32px;
        border-radius: 12px;
        font-weight: 700;
    }
    .btn-hero-outline:hover { background: rgba(255,255,255,.08); color: #fff; transform: translateY(-2px); }

    /* ════════════════════════════════
       ESTADÍSTICAS
    ════════════════════════════════ */
    .stats {
        background: var(--primary);
        padding: 28px 20px;
    }
    .stats-inner {
        display: flex;
        justify-content: center;
        gap: 0;
        flex-wrap: wrap;
        width: min(900px, 100%);
        margin: 0 auto;
    }
    .stat-item {
        flex: 1;
        min-width: 160px;
        text-align: center;
        padding: 16px 24px;
        border-right: 1px solid rgba(255,255,255,.15);
    }
    .stat-item:last-child { border-right: none; }
    .stat-item__number {
        font-size: 30px;
        font-weight: 900;
        color: #fff;
        line-height: 1;
        margin-bottom: 4px;
    }
    .stat-item__label {
        font-size: 12px;
        font-weight: 600;
        color: rgba(255,255,255,.65);
        text-transform: uppercase;
        letter-spacing: .8px;
    }

    /* ════════════════════════════════
       SECCIONES COMUNES
    ════════════════════════════════ */
    .section-wrap {
        padding: 72px 20px;
    }
    .section-wrap--alt { background: #fff; }
    .section-wrap--bg  { background: var(--bg); }

    .section-header {
        text-align: center;
        margin-bottom: 48px;
    }
    .section-header h2 {
        font-size: 28px;
        font-weight: 900;
        color: var(--text);
        margin-bottom: 8px;
    }
    .section-header p {
        font-size: 15px;
        color: var(--muted);
    }

    .inner { width: min(1100px, 100%); margin: 0 auto; }

    /* ════════════════════════════════
       BENEFICIOS
    ════════════════════════════════ */
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }
    .benefit-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px 22px;
        text-align: center;
        transition: transform .2s, box-shadow .2s;
    }
    .benefit-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(0,0,0,.08);
    }
    .benefit-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(37,99,235,.08);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 22px;
    }
    .benefit-card h3 { font-size: 15px; font-weight: 800; color: var(--text); margin-bottom: 8px; }
    .benefit-card p  { font-size: 13px; color: var(--muted); line-height: 1.6; }

    /* ════════════════════════════════
       CATEGORÍAS
    ════════════════════════════════ */
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(155px, 1fr));
        gap: 14px;
    }
    .category-card {
        background: var(--bg);
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 24px 16px 20px;
        text-align: center;
        text-decoration: none;
        color: var(--text);
        font-weight: 700;
        font-size: 14px;
        transition: .2s;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
    .category-card:hover {
        background: rgba(37,99,235,.06);
        border-color: var(--primary);
        color: var(--primary);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(37,99,235,.1);
    }
    .category-card__icon {
        font-size: 28px;
        line-height: 1;
    }

    /* ════════════════════════════════
       PANEL DE ADMINISTRACIÓN
    ════════════════════════════════ */
    .admin-panel {
        background: var(--dark);
        padding: 72px 20px;
    }
    .admin-panel .section-header h2 { color: #fff; }
    .admin-panel .section-header p  { color: rgba(255,255,255,.45); }

    .admin-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 18px;
    }
    .admin-card {
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: var(--radius);
        padding: 26px 22px;
        text-decoration: none;
        color: #fff;
        transition: .2s;
        display: flex;
        flex-direction: column;
        gap: 14px;
        position: relative;
        overflow: hidden;
    }
    .admin-card:hover {
        background: rgba(255,255,255,.09);
        border-color: rgba(255,255,255,.22);
        transform: translateY(-3px);
    }
    /* estado "próximamente" */
    .admin-card--disabled {
        opacity: .5;
        cursor: not-allowed;
        pointer-events: none;
    }
    .admin-card__icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .admin-card__icon--blue    { background: rgba(37,99,235,.25);  }
    .admin-card__icon--cyan    { background: rgba(6,182,212,.2);   }
    .admin-card__icon--purple  { background: rgba(139,92,246,.2);  }
    .admin-card__icon--green   { background: rgba(16,185,129,.2);  }

    .admin-card__title {
        font-size: 15px;
        font-weight: 800;
        color: #fff;
        margin-bottom: 4px;
    }
    .admin-card__desc {
        font-size: 13px;
        color: rgba(255,255,255,.5);
        line-height: 1.55;
    }
    .admin-card__badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        background: rgba(6,182,212,.15);
        border: 1px solid rgba(6,182,212,.25);
        color: var(--accent);
        width: fit-content;
        margin-top: 4px;
    }
    .admin-card__badge--soon {
        background: rgba(255,255,255,.06);
        border-color: rgba(255,255,255,.14);
        color: rgba(255,255,255,.4);
    }
    .admin-card__arrow {
        position: absolute;
        bottom: 22px;
        right: 22px;
        font-size: 18px;
        color: rgba(255,255,255,.2);
        transition: .2s;
    }
    .admin-card:hover .admin-card__arrow {
        color: rgba(255,255,255,.6);
        transform: translateX(3px);
    }

    /* ════════════════════════════════
       CTA
    ════════════════════════════════ */
    .cta {
        background: linear-gradient(135deg, var(--primary) 0%, #1e40af 100%);
        padding: 80px 20px;
        text-align: center;
    }
    .cta h2 { font-size: 32px; font-weight: 900; color: #fff; margin-bottom: 12px; }
    .cta p  {
        font-size: 16px;
        color: rgba(255,255,255,.72);
        margin: 0 auto 36px;
        max-width: 440px;
        line-height: 1.65;
    }
    .btn-white {
        background: #fff;
        color: var(--primary);
        border-color: #fff;
        font-weight: 800;
        font-size: 15px;
        padding: 14px 34px;
        border-radius: 12px;
    }
    .btn-white:hover { background: #f0f4ff; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,.15); }

    /* ════════════════════════════════
       FOOTER
    ════════════════════════════════ */
    .footer {
        background: var(--dark);
        border-top: 1px solid rgba(255,255,255,.07);
        padding: 36px 20px;
    }
    .footer-inner {
        width: min(1100px, 100%);
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }
    .footer__brand {
        color: #fff;
        font-size: 18px;
        font-weight: 900;
        text-decoration: none;
        letter-spacing: .2px;
    }
    .footer__brand span { color: var(--accent); }
    .footer__links {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }
    .footer__links a {
        font-size: 13px;
        color: rgba(255,255,255,.4);
        text-decoration: none;
        transition: color .15s;
    }
    .footer__links a:hover { color: rgba(255,255,255,.8); }
    .footer__copy {
        font-size: 12px;
        color: rgba(255,255,255,.3);
        width: 100%;
        text-align: center;
        margin-top: 8px;
        padding-top: 16px;
        border-top: 1px solid rgba(255,255,255,.06);
    }
</style>

{{-- ══════════════════════════════════════════
     HERO
══════════════════════════════════════════ --}}
<section class="hero">
    <div class="hero__inner">
        <div class="hero__eyebrow">Tienda de electrónica en línea</div>
        <h1 class="hero__title">
            Tecnología de punta,<br>
            <span>al alcance de todos</span>
        </h1>
        <p class="hero__subtitle">
            Smartphones, laptops, audio, accesorios y más.<br>
            Calidad garantizada · Envío rápido · Soporte real.
        </p>
        <div class="hero__actions">
            <a href="{{ route('product.index') }}" class="btn btn-hero-primary">
                Ver catálogo completo
            </a>
            <a href="#admin-panel" class="btn btn-hero-outline">
                Panel de gestión ↓
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     ESTADÍSTICAS
══════════════════════════════════════════ --}}
<div class="stats">
    <div class="stats-inner">
        <div class="stat-item">
            <div class="stat-item__number">200+</div>
            <div class="stat-item__label">Productos</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">6</div>
            <div class="stat-item__label">Categorías</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">24h</div>
            <div class="stat-item__label">Envío express</div>
        </div>
        <div class="stat-item">
            <div class="stat-item__number">100%</div>
            <div class="stat-item__label">Garantía oficial</div>
        </div>
    </div>
</div>

{{-- ══════════════════════════════════════════
     CATEGORÍAS DESTACADAS
══════════════════════════════════════════ --}}
<section class="section-wrap section-wrap--bg">
    <div class="inner">
        <div class="section-header">
            <h2>Categorías destacadas</h2>
            <p>Encuentra exactamente lo que necesitas</p>
        </div>
        <div class="categories-grid">
            <a href="{{ route('product.index') }}" class="category-card">
                <span class="category-card__icon">📱</span>
                <span>Smartphones</span>
            </a>
            <a href="{{ route('product.index') }}" class="category-card">
                <span class="category-card__icon">💻</span>
                <span>Laptops</span>
            </a>
            <a href="{{ route('product.index') }}" class="category-card">
                <span class="category-card__icon">🎧</span>
                <span>Audio</span>
            </a>
            <a href="{{ route('product.index') }}" class="category-card">
                <span class="category-card__icon">📷</span>
                <span>Fotografía</span>
            </a>
            <a href="{{ route('product.index') }}" class="category-card">
                <span class="category-card__icon">🖥️</span>
                <span>Monitores</span>
            </a>
            <a href="{{ route('product.index') }}" class="category-card">
                <span class="category-card__icon">🔌</span>
                <span>Accesorios</span>
            </a>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     BENEFICIOS
══════════════════════════════════════════ --}}
<section class="section-wrap section-wrap--alt">
    <div class="inner">
        <div class="section-header">
            <h2>¿Por qué elegirnos?</h2>
            <p>Compramos con confianza en Electronictech</p>
        </div>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">🚚</div>
                <h3>Envío rápido</h3>
                <p>Despacho en 24–48 h a todo el país con seguimiento en tiempo real.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🔒</div>
                <h3>Pago seguro</h3>
                <p>Transacciones cifradas. Tarjetas, transferencia y contra entrega.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">🛠️</div>
                <h3>Garantía oficial</h3>
                <p>Garantía de fábrica y soporte posventa en todos los productos.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon">💬</div>
                <h3>Soporte 24/7</h3>
                <p>Equipo disponible antes y después de tu compra, siempre.</p>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     PANEL DE ADMINISTRACIÓN / CONFIGURACIÓN
══════════════════════════════════════════ --}}
<section class="admin-panel" id="admin-panel">
    <div class="inner">
        <div class="section-header">
            <h2>Panel de gestión</h2>
            <p>Administra tu tienda desde un solo lugar</p>
        </div>

        <div class="admin-grid">

            {{-- Productos (activo) --}}
            <a href="{{ route('product.index') }}" class="admin-card">
                <div class="admin-card__icon admin-card__icon--blue">📦</div>
                <div>
                    <div class="admin-card__title">Productos</div>
                    <div class="admin-card__desc">Gestiona el catálogo completo: agrega, consulta y elimina productos.</div>
                    <div class="admin-card__badge">Activo</div>
                </div>
                <span class="admin-card__arrow">→</span>
            </a>

            {{-- Nuevo producto (activo) --}}
            <a href="{{ route('product.create') }}" class="admin-card">
                <div class="admin-card__icon admin-card__icon--cyan">➕</div>
                <div>
                    <div class="admin-card__title">Agregar producto</div>
                    <div class="admin-card__desc">Crea un nuevo producto con nombre, precio, imagen y categoría.</div>
                    <div class="admin-card__badge">Activo</div>
                </div>
                <span class="admin-card__arrow">→</span>
            </a>

            {{-- Categorías (activo) --}}
            <a href="{{ route('category.index') }}" class="admin-card">
                <div class="admin-card__icon admin-card__icon--purple">🗂️</div>
                <div>
                    <div class="admin-card__title">Categorías</div>
                    <div class="admin-card__desc">Crea y organiza las categorías de productos de la tienda.</div>
                    <div class="admin-card__badge">Activo</div>
                </div>
                <span class="admin-card__arrow">→</span>
            </a>

            {{-- Configuración (próximamente) --}}
            <div class="admin-card admin-card--disabled">
                <div class="admin-card__icon admin-card__icon--green">⚙️</div>
                <div>
                    <div class="admin-card__title">Configuración</div>
                    <div class="admin-card__desc">Nombre de la tienda, moneda, métodos de pago y ajustes generales.</div>
                    <div class="admin-card__badge admin-card__badge--soon">Próximamente</div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CTA
══════════════════════════════════════════ --}}
<section class="cta">
    <h2>¿Listo para explorar el catálogo?</h2>
    <p>Más de 200 productos disponibles. Nuevas llegadas cada semana.</p>
    <a href="{{ route('product.index') }}" class="btn btn-white">
        Ir al catálogo completo
    </a>
</section>

{{-- ══════════════════════════════════════════
     FOOTER
══════════════════════════════════════════ --}}
<footer class="footer">
    <div class="footer-inner">
        <a class="footer__brand" href="{{ url('/') }}">
            Electronic<span>tech</span>
        </a>
        <nav class="footer__links">
            <a href="{{ route('product.index') }}">Catálogo</a>
            <a href="{{ route('product.create') }}">Agregar producto</a>
            <a href="#admin-panel">Panel de gestión</a>
        </nav>
        <div class="footer__copy">
            &copy; {{ date('Y') }} Electronictech &mdash; Todos los derechos reservados
        </div>
    </div>
</footer>

@endsection
