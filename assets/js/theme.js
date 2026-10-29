/**
 * Masthead behaviour: the small screen menu, plus the colophon edition toggle.
 *
 * @package Broadside
 */
( function () {
	'use strict';

	var root = document.documentElement;
	var strings = window.broadsideL10n || {};
	var themeToggle = document.querySelector( '[data-theme-toggle]' );

	function currentMode() {
		return root.getAttribute( 'data-color-mode' ) === 'dark' ? 'dark' : 'day';
	}

	function paintThemeToggle() {
		if ( ! themeToggle ) {
			return;
		}

		var isNight = currentMode() === 'dark';

		themeToggle.setAttribute(
			'aria-label',
			isNight ? ( strings.switchToDay || 'Switch to day edition' ) : ( strings.switchToNight || 'Switch to night edition' )
		);
	}

	if ( themeToggle ) {
		paintThemeToggle();

		themeToggle.addEventListener( 'click', function () {
			var next = currentMode() === 'dark' ? 'day' : 'dark';
			root.setAttribute( 'data-color-mode', next );

			try {
				window.localStorage.setItem( 'broadside-color-mode', next );
			} catch ( error ) {}

			paintThemeToggle();
		} );
	}

	var navToggle = document.querySelector( '[data-nav-toggle]' );
	var navPanel = document.getElementById( 'topbar-nav' );

	if ( navToggle && navPanel ) {
		var navLabel = navToggle.querySelector( '.nav-toggle__text' );

		function setNavOpen( open ) {
			navPanel.classList.toggle( 'is-open', open );
			navToggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );

			if ( navLabel ) {
				navLabel.textContent = open ? ( strings.closeMenu || 'Close menu' ) : ( strings.menu || 'Menu' );
			}
		}

		navToggle.addEventListener( 'click', function ( event ) {
			var willOpen = navToggle.getAttribute( 'aria-expanded' ) !== 'true';
			setNavOpen( willOpen );

			if ( willOpen && event.detail === 0 ) {
				var firstLink = navPanel.querySelector( 'a' );
				if ( firstLink ) {
					firstLink.focus();
				}
			}
		} );

		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' && navToggle.getAttribute( 'aria-expanded' ) === 'true' ) {
				setNavOpen( false );
				navToggle.focus();
			}
		} );

		document.addEventListener( 'click', function ( event ) {
			if ( navToggle.getAttribute( 'aria-expanded' ) !== 'true' ) {
				return;
			}

			if ( navPanel.contains( event.target ) || navToggle.contains( event.target ) ) {
				return;
			}

			setNavOpen( false );
		} );

		if ( window.matchMedia ) {
			var wideScreen = window.matchMedia( '(min-width: 861px)' );
			var closeOnWide = function ( event ) {
				if ( event.matches ) {
					setNavOpen( false );
				}
			};

			if ( wideScreen.addEventListener ) {
				wideScreen.addEventListener( 'change', closeOnWide );
			} else if ( wideScreen.addListener ) {
				wideScreen.addListener( closeOnWide );
			}
		}
	}
}() );
