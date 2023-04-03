# Resume PDF Builder
Resume PDF Builder based on mPDF library 

## Requirements

1. [Docker Engine](https://docs.docker.com/engine/install/) v20.10+
2. [Docker Compose](https://docs.docker.com/compose/install/) v1.29+

## How to use

1. Clone this repository.
2. Add data to templates folder `./app/src/templates`
2. Run build script

```bash
make build
```

3. Run application

```bash
make run
```

4. Open `./output` folder to see generated pdf files

