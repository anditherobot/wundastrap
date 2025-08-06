#!/bin/bash

# WordPress Theme Deployment Script
# This script clones/updates the wundastrap theme and activates it using WP-CLI

set -e  # Exit on any error

# Configuration
REPO_URL="https://github.com/anditherobot/wundastrap.git"
THEME_NAME="wundastrap"
WP_PATH="${WP_PATH:-$(pwd)}"  # Use current directory if WP_PATH not set

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Functions
log_info() {
    echo -e "${BLUE}[INFO]${NC} $1"
}

log_success() {
    echo -e "${GREEN}[SUCCESS]${NC} $1"
}

log_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

log_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

# Check if WP-CLI is available
check_wp_cli() {
    if ! command -v wp &> /dev/null; then
        log_error "WP-CLI is not installed or not in PATH"
        log_info "Install WP-CLI from: https://wp-cli.org/"
        exit 1
    fi
    log_success "WP-CLI found"
}

# Check if we're in a WordPress installation
check_wordpress() {
    if [ ! -f "${WP_PATH}/wp-config.php" ]; then
        log_error "WordPress installation not found at: ${WP_PATH}"
        log_info "Please run this script from your WordPress root directory or set WP_PATH environment variable"
        exit 1
    fi
    log_success "WordPress installation found"
}

# Clone or update the theme repository
deploy_theme() {
    local theme_path="${WP_PATH}/wp-content/themes/${THEME_NAME}"
    
    if [ -d "$theme_path" ]; then
        log_info "Theme directory exists. Pulling latest changes..."
        cd "$theme_path"
        
        # Check if it's a git repository
        if [ -d ".git" ]; then
            git fetch origin
            git reset --hard origin/master
            log_success "Theme updated to latest version"
        else
            log_warning "Theme directory exists but is not a git repository"
            log_info "Removing existing directory and cloning fresh..."
            cd ..
            rm -rf "$THEME_NAME"
            git clone "$REPO_URL" "$THEME_NAME"
            log_success "Theme cloned successfully"
        fi
    else
        log_info "Cloning theme repository..."
        cd "${WP_PATH}/wp-content/themes"
        git clone "$REPO_URL" "$THEME_NAME"
        log_success "Theme cloned successfully"
    fi
}

# Activate the theme using WP-CLI
activate_theme() {
    log_info "Activating theme: ${THEME_NAME}"
    
    cd "$WP_PATH"
    
    # Check if theme exists in WordPress
    if wp theme is-installed "$THEME_NAME" --allow-root 2>/dev/null; then
        wp theme activate "$THEME_NAME" --allow-root
        log_success "Theme '${THEME_NAME}' activated successfully"
        
        # Show current theme status
        log_info "Current active theme:"
        wp theme list --status=active --allow-root
    else
        log_error "Theme '${THEME_NAME}' not found in WordPress installation"
        log_info "Available themes:"
        wp theme list --allow-root
        exit 1
    fi
}

# Main execution
main() {
    log_info "Starting WordPress theme deployment..."
    log_info "Repository: ${REPO_URL}"
    log_info "WordPress Path: ${WP_PATH}"
    log_info "Theme Name: ${THEME_NAME}"
    echo
    
    check_wp_cli
    check_wordpress
    deploy_theme
    activate_theme
    
    echo
    log_success "Theme deployment completed successfully!"
    log_info "Your WordPress site is now using the '${THEME_NAME}' theme"
}

# Help function
show_help() {
    echo "WordPress Theme Deployment Script"
    echo
    echo "Usage: $0 [OPTIONS]"
    echo
    echo "Options:"
    echo "  -h, --help     Show this help message"
    echo "  -p, --path     WordPress installation path (default: current directory)"
    echo
    echo "Environment Variables:"
    echo "  WP_PATH        Path to WordPress installation"
    echo
    echo "Examples:"
    echo "  $0                           # Deploy to current directory"
    echo "  $0 --path /var/www/html      # Deploy to specific path"
    echo "  WP_PATH=/var/www/html $0     # Deploy using environment variable"
}

# Parse command line arguments
while [[ $# -gt 0 ]]; do
    case $1 in
        -h|--help)
            show_help
            exit 0
            ;;
        -p|--path)
            WP_PATH="$2"
            shift 2
            ;;
        *)
            log_error "Unknown option: $1"
            show_help
            exit 1
            ;;
    esac
done

# Run main function
main