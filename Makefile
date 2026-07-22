THEME_DIR := app/public/wp-content/themes/drtalk-redesign
BUILD_DIR := build
PACKAGE_DIR := $(BUILD_DIR)/package
ARCHIVE := $(BUILD_DIR)/drtalk-redesign.zip

.PHONY: build clean

build: clean
	cd $(THEME_DIR) && npm ci && npm run build
	mkdir -p $(PACKAGE_DIR)/drtalk-redesign
	rsync -a \
		--exclude node_modules \
		--exclude src \
		--exclude assets/js \
		--exclude tests \
		--exclude .git \
		--exclude .idea \
		--exclude .vscode \
		--exclude .cache \
		--exclude package.json \
		--exclude package-lock.json \
		--exclude postcss.config.mjs \
		--exclude .prettierignore \
		--exclude .prettierrc.yml \
		$(THEME_DIR)/ $(PACKAGE_DIR)/drtalk-redesign/
	cd $(PACKAGE_DIR) && zip -rq ../drtalk-redesign.zip drtalk-redesign
	@echo "Created $(ARCHIVE)"

clean:
	rm -rf $(BUILD_DIR)
