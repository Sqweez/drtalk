.PHONY: build deploy clean

build:
	./deploy.sh

deploy: build

clean:
	rm -rf build
